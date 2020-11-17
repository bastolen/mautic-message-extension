<?php

namespace MauticPlugin\MauticMessageExtensionBundle\Services;

use Joomla\Http\Http;
use Mautic\LeadBundle\Entity\Lead;
use MauticPlugin\MauticMessageExtensionBundle\Helpers\MessageHelper;

class MessageService
{

  const TOKEN_HEADER = 'X-CM-PRODUCTTOKEN';

  /**
   * @var Http
   */
  private $httpClient;

  /**
   * @var MessageHelper
   */
  private $helper;

  public function __construct(Http $connector, MessageHelper $helper)
  {
    $this->httpClient = $connector;
    $this->helper = $helper;
  }

  public function sendMessage(string $originalText, Lead $lead)
  {
    $message = $this->helper->getMessageText($lead, $originalText, true);
    $number = $lead->getMobile();

    [
      'cmSender' => $cmSender,
      'cmAccount' => $cmAccount,
      'cmGateway' => $cmGateway,
    ] = $this->helper->getKeys();

    $payload = [
      'recipients' => [['msisdn' => $number]],
      'body' => $message,
      'senders' => [$cmSender]
    ];

    $url = 'https://api.cm.com/messages/v1/accounts/' . $cmAccount . '/messages';
    $response = $this->httpClient->post($url, json_encode($payload), [self::TOKEN_HEADER => $cmGateway, 'Content-Type' => 'application/json'], 60);

    if (!in_array($response->code, [200, 201])) {
      throw new \OutOfRangeException('CM SMS service couldn\'t send message: ' . $response->code);
    }
  }
}
