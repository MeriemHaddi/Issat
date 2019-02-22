<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Lists all Professors entities.
     *
     * @Route("/professors", name="professors_index")
     * @Method("GET")
     * @Security("has_role('ROLE_STUDENT') or has_role('ROLE_TEACHER')  or has_role('ROLE_SUPER_ADMIN')")
     */

    public function allProfessorsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('@User/Teacher/allProfessors.html.twig', array(
            'users' => $users,
        ));
    }


    /**
     * Lists all Professors entities.
     *
     * @Route("/student", name="students_index")
     * @Method("GET")
     * @Security("has_role('ROLE_STUDENT') or has_role('ROLE_TEACHER')  or has_role('ROLE_SUPER_ADMIN')")
     */

    public function allStudentsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('@User/Student/allStudent.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('UserBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('UserBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/professor/{id}/edit", name="professor_edit")
     * @Method({"GET", "POST"})
     */
    public function editProfessorAction(Request $request, User $professor)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('UserBundle\Form\UserType', $professor);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professors_index');
        }

        return $this->render('@User/Teacher/edit_professors.html.twig', array(
            '$professor' => $professor,
            'form' => $form->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/student/{id}/edit", name="student_edit")
     * @Method({"GET", "POST"})
     */
    public function editStudentAction(Request $request, User $student)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('UserBundle\Form\UserType', $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_index');
        }

        return $this->render('@User/Student/edit_student.html.twig', array(
            'student' => $student,
            'form' => $form->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/student/{id}/delete", name="Student_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteStudentAction(Request $request, User $user)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($user);
        $userManager->deleteUser($user);

        return $this->redirectToRoute('students_index');
    }

    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/professor/{id}/delete", name="professor_delete")
     * @Method({"GET", "POST"})
     */
    public function deleteProfessorAction(Request $request, User $user)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($user);
        $userManager->deleteUser($user);

        return $this->redirectToRoute('professors_index');
    }

    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/logout", name="logoutAction")
     * @Method({"GET", "POST"})
     */
    public function logout(Request $request)
    {
        $this->get('security.firewall.context')->setToken(null);
        $this->get($request)->getSession()->invalidate();

        return $this->redirectToRoute('homepage');
    }


    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
