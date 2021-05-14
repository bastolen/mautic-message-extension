<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Integration\Support;

use MauticPlugin\MauticMessageExtensionBundle\Integration\MauticMessageExtensionIntegration;
use MauticPlugin\MauticMessageExtensionBundle\Form\Type\ConfigAuthType;

use Mautic\IntegrationsBundle\Integration\DefaultConfigFormTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormAuthInterface;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormInterface;

class ConfigSupport extends MauticMessageExtensionIntegration  implements ConfigFormInterface, ConfigFormAuthInterface
{
  use DefaultConfigFormTrait;

  public function getAuthConfigFormName(): string
  {
    return ConfigAuthType::class;
  }
}
