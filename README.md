# Elegant Slack

Elegant Slack Messages is a PHP library for sending beautifully formatted messages to Slack using webhooks.

## Requirements

- PHP 8.3 or higher
- Composer

## Installation

Install the library using Composer:

```bash
composer require taboritis/elegant-slack
```

## Usage

### Sending a Plain Text Message

```php
<?php

require 'vendor/autoload.php';

use Taboritis\ElegantSlackMessages\SlackClient;
use Taboritis\ElegantSlackMessages\Blocks\Section\PlainText;

$client = new SlackClient('your-slack-webhook-url');
$message = new PlainText('Hello, Slack!');

$response = $client->send($message);

if ($response === 'ok') {
    echo 'Message sent successfully!';
} else {
    echo 'Failed to send message.';
}
```

### Sending an Elegant Message with a Button

```php
<?php

require 'vendor/autoload.php';

use Taboritis\ElegantSlackMessages\SlackClient;
use Taboritis\ElegantSlackMessages\SlackMessage;
use Taboritis\ElegantSlackMessages\Blocks\Section\Button;

$client = new SlackClient('your-slack-webhook-url');
$message = new SlackMessage();

$button = new Button(
    'Click me',
    'https://example.com',
    'primary',
    'button-123'
);

$message->addBlock($button);

$response = $client->send($message);

if ($response === 'ok') {
    echo 'Message sent successfully!';
} else {
    echo 'Failed to send message.';
}
```

## Testing

To run the tests, use PHPUnit:

```bash
vendor/bin/phpunit
```

## Continuous Integration

This project uses GitHub Actions for continuous integration. The configuration is in the `.github/workflows/ci.yml` file.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.
