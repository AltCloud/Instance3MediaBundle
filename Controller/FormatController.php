<?php

namespace AltCloud\Instance3MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AltCloud\Instance3MediaBundle\Entity\Format;
use AltCloud\Instance3MediaBundle\Form\FormatType;

/**
 * Format controller.
 *
 */
class FormatController extends Controller
{
	public function renderPartialAction($id, $displayoptions=false)
	{
			$format = $this->getDoctrine()
				->getRepository('ACInst3MediaBundle:Format')
				->find($id);

			if (!$format) {
				throw $this->createNotFoundException('No Format found for id '.$id);
			}
		
        	return $this->render('ACInst3MediaBundle:Format:display.html.twig', array('format' => $format, 'displayoptions' => $displayoptions));
    }
    
    /**
     * Lists all Format entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ACInst3MediaBundle:Format')->findAll();

        return $this->render('ACInst3MediaBundle:Format:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Format entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Format')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Format entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3MediaBundle:Format:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Format entity.
     *
     */
    public function newAction()
    {
        $entity = new Format();
        $form   = $this->createForm(new FormatType(), $entity);

        return $this->render('ACInst3MediaBundle:Format:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Format entity.
     *
     */
    public function createAction()
    {
        $entity  = new Format();
        $request = $this->getRequest();
        $form    = $this->createForm(new FormatType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_format_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ACInst3MediaBundle:Format:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Format entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Format')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Format entity.');
        }

        $editForm = $this->createForm(new FormatType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3MediaBundle:Format:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Format entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Format')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Format entity.');
        }

        $editForm   = $this->createForm(new FormatType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_format_edit', array('id' => $id)));
        }

        return $this->render('ACInst3MediaBundle:Format:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Format entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ACInst3MediaBundle:Format')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Format entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_format'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
