<?php

namespace MauticPlugin\MauticMessageExtensionBundle;

return [
  'version'     => '0.2.3',
  'author'      => 'Bas Tolen',
  'services'    => [
    'integrations' => [
      'message_extension.integration' => [
        'class'     => Integration\MessageExtensionIntegration::class,
        'arguments' => [],
      ],
    ],
    'events' => [
      'message_extension.campaign.basic_sms.subscriber' => [
        'class' => EventListener\BasicSMSSubscriber::class,
        'arguments' => [
          'message_extension.service'
        ],
      ],
    ],
    'forms' => [
      'message_extension.forms.sms_form_basic' => [
        'class'     => Form\Type\MessageExtensionSMSFormBasic::class,
        'arguments' => [],
        'alias' => Form\Type\MessageExtensionSMSFormBasic::FORM_TYPE_NAME,
      ],
    ],
    'helpers' => [
      'message_extension.helper' => [
        'class' => Helpers\MessageHelper::class,
        'arguments' => [
          'mautic.helper.integration'
        ]
      ]
    ],
    'others' => [
      'message_extension.service' => [
        'class' => Services\MessageService::class,
        'arguments' => [
          'mautic.http.connector',
          'message_extension.helper',
          'monolog.logger.mautic',
        ]
      ],
    ]
  ]
];
