<?php

namespace AltCloud\Instance3MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GalleryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('datetime')
            ->add('cover', 'entity', array(
    								'class' => 'ACInst3MediaBundle:Media',
    							    'required' => false,
    								'property' => 'title'
									)
				 );
    }

    public function getName()
    {
        return 'altcloud_instance3mediabundle_gallerytype';
    }
}
