<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageExtensionSMSFormBasic extends AbstractType
{
  public function __construct()
  {
  }

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
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
    return 'message_extension_sms_form_basic';
  }
}