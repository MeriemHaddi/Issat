<?php

namespace DepartementBundle\Controller;

use DepartementBundle\Entity\Classe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use UserBundle\Entity\User;

/**
 * Classe controller.
 *
 * @Route("classe")
 */
class ClasseController extends Controller
{
    /**
     * Lists all classe entities.
     *
     * @Route("/", name="classe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $classes = $em->getRepository('DepartementBundle:Classe')->findAll();

        return $this->render('@Departement/Classe/all_classes.html.twig', array(
            'classes' => $classes,
        ));
    }


    /**
     * Lists all classe entities.
     *
     * @Route("/student/{id}", name="class_student")
     * @Method("GET")
     */
    public function listStudentClassAction(Classe $classe)
    {
        $em = $this->getDoctrine()->getManager();

        $students = $em->getRepository('UserBundle:User')->findBy(array('classe' => $classe->getId()));


        return $this->render('@Departement/Classe/allStudent.html.twig', array(
            'users' => $students,
       ));


    }

    /**
     * Lists all classe entities.
     *
     * @Route("/teachers/{id}", name="class_teacher")
     * @Method("GET")
     */
    public function listTeachersClassAction(Classe $classe)
    {
        $em = $this->getDoctrine()->getManager();

        $teachers = $em->getRepository('DepartementBundle:PlanningCourse')->findBy(
            array(
                'classes' => $classe->getId(),

            ));
$users =array();
        foreach($teachers as $game)
        {
             // No longer an object and is now a standard variable pointer for $game.
            array_push($users, $game->getTeachers());

        }

        return $this->render('@Departement/Classe/allProfessors.html.twig', array(
            'users' => $users,
        ));

    }


    /**
     * Lists all classe entities.
     *
     * @Route("/courses/{id}", name="courses_teacher")
     * @Method("GET")
     */
    public function listCoursesClassAction(Classe $classe)
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('DepartementBundle:PlanningCourse')->findBy(
            array(
                'classes' => $classe->getId(),

            ));
        $users =array();
        foreach($courses as $game)
        {
            // No longer an object and is now a standard variable pointer for $game.
            array_push($users, $game->getCourses());

        }
        return $this->render('@Departement/Classe/all_courses.html.twig', array(
            'courses' => $users,
        ));

    }
    /**
     * Lists all classe entities.
     *
     * @Route("/user/{id}", name="enable_user")
     * @Method("GET")
     */
    public function EnableAction(User $user)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user->getId());
        $user->setEnabled('1');
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('students_index');

    }


    /**
     * Creates a new classe entity.
     *
     * @Route("/new", name="classe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $classe = new Classe();
        $form = $this->createForm('DepartementBundle\Form\ClasseType', $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($classe);
            $em->flush();

            return $this->redirectToRoute('classe_index', array('id' => $classe->getId()));
        }

        return $this->render('@Departement/Classe/add_class.html.twig', array(
            'classe' => $classe,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing classe entity.
     *
     * @Route("/{id}/edit", name="classe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Classe $classe)
    {
        $editForm = $this->createForm('DepartementBundle\Form\ClasseType', $classe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('classe_index');
        }

        return $this->render('@Departement/Classe/edit_class.html.twig', array(
            'classe' => $classe,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a classe entity.
     *
     * @Route("/{id}", name="classe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Classe $classe)
    {


            $em = $this->getDoctrine()->getManager();
            $em->remove($classe);
            $em->flush();

        return $this->redirectToRoute('classe_index');
    }



}
