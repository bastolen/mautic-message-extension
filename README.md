# Mautic Message Extension Bundle

With this plugin you will be able to send SMS messages using the [CM.com] Messaging API.

## Usage

After installation, in the campaign builder a new action appears. This action will send a message at the given time. If you want to use personal information in the message, you can use variables in the normal Mautic way. For example: `Hi {contactfield=firstname|there}` will result in `Hi Bas` or `Hi there` if no firstname was found. Any URL, passed in as Mautic variable, will be automatically shortened by [CM.com]

## Installation

### CLI

1. Run `composer require bastolen/mautic-message-extension-bundle` in the root of the Mautic installation.
2. Reload the plugins using the `mautic:plugins:reload` command

### Manual

1. Download the latest version from [github.com/bastolen/mautic-message-extension/releases]
2. Unzip the files to plugins/MauticMessageExtensionBundle
3. Go to YourMautic.domain/s/plugins/reload

## Setup

1. Go to YourMautic.domain/s/plugins
2. Enable the Message Extension plugin
3. Choose the sender name
4. Fill in your CM Account Id and Gateway Product Token. These can be found by going to [cm.com/app/gateway]. This will show the Product Token. The account Id is in the URL.

[cm.com]: https://cm.com
[github.com/bastolen/mautic-message-extension/releases]: https://github.com/bastolen/mautic-message-extension/releases
[cm.com/app/gateway/]: https://www.cm.com/app/gateway/
