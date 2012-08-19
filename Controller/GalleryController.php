<?php

namespace AltCloud\Instance3MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AltCloud\Instance3MediaBundle\Entity\Gallery;
use AltCloud\Instance3MediaBundle\Form\GalleryType;

/**
 * Gallery controller.
 *
 */
class GalleryController extends Controller
{
	public function renderPartialAction($id, $displayoptions = false)
	{
			$gallery = $this->getDoctrine()
				->getRepository('ACInst3MediaBundle:Gallery')
				->find($id);

			if (!$gallery) {
				throw $this->createNotFoundException('No Media found for id '.$id);
			}
		
        	return $this->render('ACInst3MediaBundle:Gallery:renderPartial.html.twig', array('gallery' => $gallery, 'displayoptions' => $displayoptions));
    }
    
	public function renderAction($id, $node=false, $displayoptions = false)
	{
			$gallery = $this->getDoctrine()
				->getRepository('ACInst3MediaBundle:Gallery')
				->find($id);

			if (!$gallery) {
				throw $this->createNotFoundException('No Gallery found for id '.$id);
			}
	
			if (is_object($node)){
				$nodetpl = $node->getSite()->getDeftemp();
				if(is_string($nodetpl))
					$tpl=$nodetpl;
			}
			
			if(!isset($tpl)){
				// Determine tpl based on request uri, if possible
			}
			
			if(!isset($tpl)){
				// Use default tpl
				// FIXME: Move to setting somewhere
				$tpl="JMCOMPRCTRBundle::layout.html.twig";
			}
		
        	return $this->render('ACInst3MediaBundle:Gallery:render.html.twig', array('gallery' => $gallery, 'tpl' => $tpl, 'node' => $node, 'displayoptions' => $displayoptions));
    }

    /**
     * Lists all Gallery entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ACInst3MediaBundle:Gallery')->findAll();

        return $this->render('ACInst3MediaBundle:Gallery:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Gallery entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3MediaBundle:Gallery:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Gallery entity.
     *
     */
    public function newAction()
    {
        $entity = new Gallery();
        $form   = $this->createForm(new GalleryType(), $entity);

        return $this->render('ACInst3MediaBundle:Gallery:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Gallery entity.
     *
     */
    public function createAction()
    {
        $entity  = new Gallery();
        $request = $this->getRequest();
        $form    = $this->createForm(new GalleryType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_gallery_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ACInst3MediaBundle:Gallery:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Gallery entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $editForm = $this->createForm(new GalleryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3MediaBundle:Gallery:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Gallery entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $editForm   = $this->createForm(new GalleryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_gallery_edit', array('id' => $id)));
        }

        return $this->render('ACInst3MediaBundle:Gallery:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Gallery entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ACInst3MediaBundle:Gallery')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gallery entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_gallery'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
