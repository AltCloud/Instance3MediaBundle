<?php

namespace AltCloud\Instance3MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AltCloud\Instance3MediaBundle\Entity\Media;
use AltCloud\Instance3MediaBundle\Entity\Format;
use AltCloud\Instance3MediaBundle\Form\MediaType;

/**
 * Media controller.
 *
 */
class MediaController extends Controller
{

    public function accordionPartialAction($gallery=false,$displayoptions=false)
    {
        $em = $this->getDoctrine()->getEntityManager();

		if(is_int($gallery)){
        	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findBy( array( 'gallery' => $gallery ) );
        }else{
		  	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findAll();
		}
		
        return $this->render('ACInst3MediaBundle:Media:accordionPartial.html.twig', array('medias' => $medias, 'displayoptions' => $displayoptions));

    }

    public function matrixPartialAction($gallery=false,$displayoptions=false)
    {
        $em = $this->getDoctrine()->getEntityManager();

		if(is_int($gallery)){
        	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findBy( array( 'gallery' => $gallery ) );
        }else{
		  	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findAll();
		}
		
        return $this->render('ACInst3MediaBundle:Media:matrixPartial.html.twig', array('medias' => $medias, 'displayoptions' => $displayoptions));

    }

    public function listAction($node=false,$gallery=false,$displayoptions=false)
    {
        $em = $this->getDoctrine()->getEntityManager();

		if(is_int($gallery)){
        	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findBy( array( 'gallery' => $gallery ) );
        }else{
		  	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findAll();
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
			$tpl="JMORGSTJMBundle::layout.html.twig";
		}
		
        return $this->render('ACInst3MediaBundle:Media:list.html.twig', array('medias' => $medias, 'tpl' => $tpl, 'node' => $node, 'displayoptions' => $displayoptions));

    }
    
    public function listPartialAction($gallery=false,$displayoptions=false)
    {
        $em = $this->getDoctrine()->getEntityManager();

		if(is_int($gallery)){
        	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findBy( array( 'gallery' => $gallery ) );
        }else{
		  	$medias = $em->getRepository('ACInst3MediaBundle:Media')->findAll();
		}
		
        return $this->render('ACInst3MediaBundle:Media:listPartial.html.twig', array('medias' => $medias, 'displayoptions' => $displayoptions));

    }

	public function displayFormatAction($id,$displayoptions=false)
	{
			$media = $this->getDoctrine()
				->getRepository('ACInst3MediaBundle:Media')
				->find($id);

			if (!$media) {
				throw $this->createNotFoundException('No Media found for id '.$id);
			}
		
        	return $this->render('ACInst3MediaBundle:Media:displayFormat.html.twig', array('media' => $media, 'displayoptions' => $displayoptions));
    }
    
	public function renderPartialAction($id,$displayoptions=false)
	{
			$media = $this->getDoctrine()
				->getRepository('ACInst3MediaBundle:Media')
				->find($id);

			if (!$media) {
				throw $this->createNotFoundException('No Media found for id '.$id);
			}
		
        	return $this->render('ACInst3MediaBundle:Media:renderPartial.html.twig', array('media' => $media, 'displayoptions' => $displayoptions));
    }
    
	public function renderAction($id, $node=false,$displayoptions=false)
	{
			$media = $this->getDoctrine()
				->getRepository('ACInst3MediaBundle:Media')
				->find($id);

			if (!$media) {
				throw $this->createNotFoundException('No Media found for id '.$id);
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
		
        	return $this->render('ACInst3MediaBundle:Media:render.html.twig', array('media' => $media, 'tpl' => $tpl, 'node' => $node, 'displayoptions' => $displayoptions));
    }
    
    /**
     * Lists all Media entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ACInst3MediaBundle:Media')->findAll();

        return $this->render('ACInst3MediaBundle:Media:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Media entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Media')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3MediaBundle:Media:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Media entity.
     *
     */
    public function newAction()
    {
        $entity = new Media();
        
        $thumbformat = new Format();
        $entity->addFormat($thumbformat);
        
        $form   = $this->createForm(new MediaType(), $entity);

        return $this->render('ACInst3MediaBundle:Media:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Media entity.
     *
     */
    public function createAction()
    {
        $entity  = new Media();
        $request = $this->getRequest();
        $form    = $this->createForm(new MediaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_media_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ACInst3MediaBundle:Media:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Media entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Media')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $editForm = $this->createForm(new MediaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3MediaBundle:Media:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Media entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3MediaBundle:Media')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $editForm   = $this->createForm(new MediaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_media_edit', array('id' => $id)));
        }

        return $this->render('ACInst3MediaBundle:Media:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Media entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ACInst3MediaBundle:Media')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Media entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_media'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
