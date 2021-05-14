<?php

declare(strict_types=1);

namespace MauticPlugin\MauticMessageExtensionBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigAuthType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder->add(
      'cmSender',
      TextType::class,
      [
        'label'      => 'message-extension.keys.cm-sender',
        'label_attr' => ['class' => 'control-label'],
        'required'   => true,
        'attr'       => [
          'class' => 'form-control',
        ],
      ]
    );

    $builder->add(
      'cmAccount',
      TextType::class,
      [
        'label'      => 'message-extension.keys.cm-account',
        'label_attr' => ['class' => 'control-label'],
        'required'   => true,
        'attr'       => [
          'class' => 'form-control',
        ],
      ]
    );

    $builder->add(
      'cmGateway',
      PasswordType::class,
      [
        'label'      => 'message-extension.keys.cm-gateway',
        'label_attr' => ['class' => 'control-label'],
        'required'   => true,
        'attr'       => [
          'class' => 'form-control',
        ],
      ]
    );
  }

  public function configureOptions(OptionsResolver $optionsResolver): void
  {
    $optionsResolver->setDefaults(
      [
        'integration' => null,
      ]
    );
  }
}
