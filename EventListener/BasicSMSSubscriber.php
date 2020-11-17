<?php

namespace MauticPlugin\MauticMessageExtensionBundle\EventListener;

use Mautic\CampaignBundle\CampaignEvents;
use Mautic\CampaignBundle\Event as Events;
use Mautic\CampaignBundle\Event\CampaignExecutionEvent;
use Mautic\CoreBundle\EventListener\CommonSubscriber;
use MauticPlugin\MauticMessageExtensionBundle\Services\MessageService;

class BasicSMSSubscriber extends CommonSubscriber
{

  const ACTION = 'message_extension.action.send_sms';
  const TRIGGER = 'message_extension.action.trigger.send_basic_sms';

  private $messageService;

  public function __construct(MessageService $messageService)
  {
    $this->messageService = $messageService;
  }

  public static function getSubscribedEvents()
  {
    return [
      CampaignEvents::CAMPAIGN_ON_BUILD => ['onCampaignBuild', 0],
      self::TRIGGER => ['onCampaignTriggerAction', 0]
    ];
  }

  public function onCampaignTriggerAction(CampaignExecutionEvent $event)
  {
    if ($event->checkContext(self::ACTION)) {
      $config = $event->getConfig();
      $message = $config['message'];
      try {
        $this->messageService->sendMessage($message, $event->getLead());
        $event->setResult(true);
      } catch (\Exception $e) {
        $event->setFailed($e->getMessage());
      }
    }
  }

  /**
   * Add event triggers and actions.
   *
   * @param Events\CampaignBuilderEvent $event
   */
  public function onCampaignBuild(Events\CampaignBuilderEvent $event)
  {
    $action = [
      'label'       => 'message-extension.campaign.action.send-sms-basic',
      'description' => 'message-extension.campaign.action.send-sms-basic_desc',
      'formType'    => 'message_extension_sms_form_basic',
      'eventName'   => self::TRIGGER,
    ];

    $event->addAction(self::ACTION, $action);
  }
}
