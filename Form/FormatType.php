<?php

namespace AltCloud\Instance3MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FormatType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('format_type')
            ->add('media_type')
            ->add('media_params')
            ->add('media', 'entity', array(
    								'class' => 'ACInst3MediaBundle:Media',
    							    'required' => true,
    								'property' => 'title'	
									)
				 );
    }

    public function getName()
    {
        return 'altcloud_instance3mediabundle_formattype';
    }
}
