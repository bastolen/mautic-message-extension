<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Helpers;

use Mautic\LeadBundle\Entity\Lead;
use Mautic\LeadBundle\Helper\TokenHelper;
use Mautic\PluginBundle\Helper\IntegrationHelper;
use MauticPlugin\MauticMessageExtensionBundle\Integration\MessageExtensionIntegration;

class MessageHelper
{
  /**
   * @var MessageExtensionIntegration
   */
  private $integration;

  public function __construct(IntegrationHelper $integrationHelper)
  {
    $this->integration   = $integrationHelper->getIntegrationObject('MessageExtension');
  }

  public function getKeys()
  {
    return $this->integration->getKeys();
  }

  private function formatProfileFields(Lead $lead, bool $shortenUrls)
  {
    $leadFields = $lead->getProfileFields();

    if ($shortenUrls) {
      foreach ($leadFields as $key => $value) {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
          $leadFields[$key] = str_replace([$value], ['[[' . $value . ']]'], $value);
        }
      }
    }

    return $leadFields;
  }

  public function getMessageText(Lead $lead, string $message, bool $shortenUrls)
  {
    $formattedFields = $this->formatProfileFields($lead, $shortenUrls);
    $message = TokenHelper::findLeadTokens($message, $formattedFields, true);
    return $message;
  }
}
