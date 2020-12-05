<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageExtensionSMSFormBasic extends AbstractType
{

  const FORM_TYPE_NAME = 'message_extension_sms_form_basic';

  public function __construct()
  {
  }

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add(
      'contact_number_field',
      'leadfields_choices',
      [
        'label'                 => 'message-extension.forms.sms.number_field',
        'label_attr'            => ['class' => 'control-label'],
        'multiple'              => false,
        'with_company_fields'   => true,
        'with_tags'             => true,
        'with_utm'              => true,
        'empty_value'           => 'mautic.core.select',
        'attr'                  => [
          'class'    => 'form-control',
        ],
        'required'    => true,
      ]
    );

    $builder->add(
      'change_lang_code',
      'yesno_button_group',
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
      'text',
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
      'textarea',
      [
        'label_attr' => ['class' => 'control-label'],
        'label'      => 'message-extension.forms.sms.message',
        'attr'       => [
          'class' => 'form-control',
        ],
        'required'    => true,
      ]
    );
  }

  public function getName()
  {
    return self::FORM_TYPE_NAME;
  }
}
