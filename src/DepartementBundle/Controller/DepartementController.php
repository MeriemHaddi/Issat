<?php

namespace DepartementBundle\Controller;

use DepartementBundle\Entity\Departement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Departement controller.
 *
 * @Route("departement")
 */
class DepartementController extends Controller
{
    /**
     * Lists all departement entities.
     *
     * @Route("/", name="departement_index")
     * @Method("GET")
     * @Security("has_role('ROLE_STUDENT') or has_role('ROLE_TEACHER')  or has_role('ROLE_SUPER_ADMIN')")

     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $departements = $em->getRepository('DepartementBundle:Departement')->findAll();

        return $this->render('DepartementBundle:departement:all_department.html.twig', array(
            'departements' => $departements,
        ));
    }

    /**
     * Creates a new departement entity.
     *
     * @Route("/new", name="departement_new")
     * @Method({"GET", "POST"})
     * @Security(" has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $departement = new Departement();
        $form = $this->createForm('DepartementBundle\Form\DepartementType', $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departement);
            $em->flush();

            return $this->redirectToRoute('departement_index');
        }

        return $this->render('@Departement/departement/add_department_bootstrap.html.twig', array(
            'departement' => $departement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a departement entity.
     *
     * @Route("/{id}", name="departement_show")
     * @Method("GET")
     */
    public function showAction(Departement $departement)
    {
        $deleteForm = $this->createDeleteForm($departement);

        return $this->render('departement/show.html.twig', array(
            'departement' => $departement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/{id}/edit", name="departement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Departement $departement)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('DepartementBundle\Form\DepartementType', $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('departement_index');
        }

        return $this->render('@Departement/departement/edit_department.html.twig', array(
            'departement' => $departement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Deletes a departement entity.
     *
     * @Route("/{id}/delete", name="departement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Departement $departement)
    {

            $em = $this->getDoctrine()->getManager();
            $em->remove($departement);
            $em->flush();

        return $this->redirectToRoute('departement_index');
    }

    /**
     * Creates a form to delete a departement entity.
     *
     * @param Departement $departement The departement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Departement $departement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departement_delete', array('id' => $departement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
