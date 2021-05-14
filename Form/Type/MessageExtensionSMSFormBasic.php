<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Mautic\CoreBundle\Form\Type\YesNoButtonGroupType;
use Mautic\LeadBundle\Form\Type\LeadFieldsType;

class MessageExtensionSMSFormBasic extends AbstractType
{

  public function __construct()
  {
  }

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add(
      'contact_number_field',
      LeadFieldsType::class,
      [
        'label'                 => 'message-extension.forms.sms.number_field',
        'label_attr'            => ['class' => 'control-label'],
        'multiple'              => false,
        'with_company_fields'   => true,
        'with_tags'             => true,
        'with_utm'              => true,
        'placeholder'           => 'mautic.core.select',
        'attr'                  => [
          'class'    => 'form-control',
        ],
        'required'    => true,
      ]
    );

    $builder->add(
      'change_lang_code',
      YesNoButtonGroupType::class,
      [
        'label_attr' => ['class' => 'control-label'],
        'label'      => 'message-extension.forms.sms.change_lang_code',
        'attr'       => [
          'class' => 'form-control',
        ],
        'required'    => true,
      ]
    );

    $builder->add(
      'default_lang_code',
      TextType::class,
      [
        'label_attr' => ['class' => 'control-label'],
        'label'      => 'message-extension.forms.sms.default_lang_code',
        'attr'       => [
          'class' => 'form-control',
        ],
        'required'    => false,
      ]
    );

    $builder->add(
      'message',
      TextareaType::class,
      [
        'label_attr' => ['class' => 'control-label'],
        'label'      => 'message-extension.forms.sms.message',
        'attr'       => [
          'class' => 'form-control',
        ],
        'required'    => true,
      ]
    );

    $builder->add(
      'shorten_url',
      YesNoButtonGroupType::class,
      [
        'label_attr' => ['class' => 'control-label'],
        'label'      => 'message-extension.forms.sms.shorten_url',
        'attr'       => [
          'class' => 'form-control',
        ],
        'required'    => true,
      ]
    );
  }
}
