<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class MessageExtensionIntegration extends AbstractIntegration
{
  public function getDisplayName()
  {
    return 'Message Extension';
  }

  public function getName()
  {
    return 'MessageExtension';
  }

  public function getIcon()
  {
    return 'plugins/MauticMessageExtensionBundle/Assets/img/icon.png';
  }

  public function getAuthenticationType()
  {
    return 'none';
  }

  public function getSecretKeys()
  {
    return [
      'cmGateway'
    ];
  }

  public function getKeys()
  {
    return array_merge([
      'isPublished' =>  $this->getIntegrationSettings()->getIsPublished() ? 1 : 0
    ], $this->keys);
  }

  public function getRequiredKeyFields()
  {
    return [
      'cmSender'  => 'message-extension.keys.cm-sender',
      'cmAccount' => 'message-extension.keys.cm-account',
      'cmGateway' => 'message-extension.keys.cm-gateway',
    ];
  }
}
