<?php

return [
  'version'     => '0.0.0',
  'author'      => 'Bas Tolen',
  'services'    => [
    'integrations' => [
      'message_extension.integration' => [
        'class'     => \MauticPlugin\MauticMessageExtensionBundle\Integration\MessageExtensionIntegration::class,
        'arguments' => [],
      ],
    ],
    'events' => [
      'message_extension.campaign.basic_sms.subscriber' => [
        'class' => \MauticPlugin\MauticMessageExtensionBundle\EventListener\BasicSMSSubscriber::class,
        'arguments' => [
          'message_extension.service'
        ],
      ],
    ],
    'forms' => [
      'message_extension.forms.sms_form_basic' => [
        'class'     => \MauticPlugin\MauticMessageExtensionBundle\Form\Type\MessageExtensionSMSFormBasic::class,
        'arguments' => [],
        'alias' => 'message_extension_sms_form_basic',
      ],
    ],
    'helpers' => [
      'message_extension.helper' => [
        'class' => \MauticPlugin\MauticMessageExtensionBundle\Helpers\MessageHelper::class,
        'arguments' => [
          'mautic.helper.integration'
        ]
      ]
    ],
    'others' => [
      'message_extension.service' => [
        'class' => \MauticPlugin\MauticMessageExtensionBundle\Services\MessageService::class,
        'arguments' => [
          'mautic.http.connector',
          'message_extension.helper'
        ]
      ],
    ]
  ]
];
