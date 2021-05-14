<?php

namespace MauticPlugin\MauticMessageExtensionBundle;

return [
  'version'     => '1.0.0',
  'author'      => 'Bas Tolen',
  'services'    => [
    'integrations' => [
      'mautic.integration.MauticMessageExtension' => [
        'class'     => Integration\MauticMessageExtensionIntegration::class,
        'tags'  => [
          'mautic.integration',
          'mautic.basic_integration',
        ],
      ],
      'MauticMessageExtension.integration.configuration' => [
        'class' => Integration\Support\ConfigSupport::class,
        'tags'  => [
          'mautic.config_integration',
        ],
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
      ],
    ],
    'helpers' => [
      'message_extension.helper' => [
        'class' => Helpers\MessageHelper::class,
        'arguments' => [
          'mautic.integrations.helper',
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
