<?php

namespace AltCloud\Instance3MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('datetime')
            ->add('gallery', 'entity', array(
    								'class' => 'ACInst3MediaBundle:Gallery',
    							    'required' => false,
    								'property' => 'title'	
									)
				 )
			->add('thumbnail', 'entity', array(
    								'class' => 'ACInst3MediaBundle:Format',
									//'query_builder' => function(\Doctrine\ORM\EntityRepository $er) {
									//	return $er->createQueryBuilder('f')
									//			->where('f.media = ?1')
									//			->setParameter(1, $media);
									//},
    							    'required' => false,
    								'property' => 'id'
									)
				 );

    }

    public function getName()
    {
        return 'altcloud_instance3mediabundle_mediatype';
    }
}
