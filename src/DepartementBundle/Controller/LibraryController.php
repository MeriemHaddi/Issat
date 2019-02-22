<?php

namespace DepartementBundle\Controller;

use DepartementBundle\Entity\Library;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Library controller.
 *
 * @Route("library")
 */
class LibraryController extends Controller
{
    /**
     * Lists all library entities.
     *
     * @Route("/", name="library_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libraries = $em->getRepository('DepartementBundle:Library')->findAll();

        return $this->render('DepartementBundle:library:all_assets.html.twig', array(
            'libraries' => $libraries,
        ));
    }

    /**
     * Creates a new library entity.
     *
     * @Route("/new", name="library_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $library = new Library();
        $form = $this->createForm('DepartementBundle\Form\LibraryType', $library);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($library);
            $em->flush();

            return $this->redirectToRoute('library_index', array('id' => $library->getId()));
        }

        return $this->render('@Departement/library/add_library_bootstrap.html.twig', array(
            'library' => $library,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a library entity.
     *
     * @Route("/{id}", name="library_show")
     * @Method("GET")
     */
    public function showAction(Library $library)
    {
        $deleteForm = $this->createDeleteForm($library);

        return $this->render('library/show.html.twig', array(
            'library' => $library,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing library entity.
     *
     * @Route("/{id}/edit", name="librarie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Library $library)
    {
        $editForm = $this->createForm('DepartementBundle\Form\LibraryType', $library);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('library_index');
        }

        return $this->render('@Departement/library/edit_library.html.twig', array(
            'library' => $library,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a library entity.
     *
     * @Route("/{id}/delete", name="librarie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Library $library)
    {

            $em = $this->getDoctrine()->getManager();
            $em->remove($library);
            $em->flush();


        return $this->redirectToRoute('library_index');
    }


}
