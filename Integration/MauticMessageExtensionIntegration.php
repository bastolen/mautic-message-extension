<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Integration;


use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;

class MauticMessageExtensionIntegration extends BasicIntegration implements BasicInterface
{
  use ConfigurationTrait;

  const DISPLAY_NAME = 'Message Extension';
  const NAME = 'MauticMessageExtension';

  public function getDisplayName(): string
  {
    return self::DISPLAY_NAME;
  }

  public function getName(): string
  {
    return self::NAME;
  }

  public function getIcon(): string
  {
    return 'plugins/MauticMessageExtensionBundle/Assets/img/icon.png';
  }
}
