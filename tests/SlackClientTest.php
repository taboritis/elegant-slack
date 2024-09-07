<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\ElegantSlackMessages\SlackClient;

#[CoversClass(SlackClient::class)]
class SlackClientTest extends \PHPUnit\Framework\TestCase
{
    #[Test]
    public function it_sends_slack_message(): void
    {
        $this->markTestSkipped('This test is skipped because it sends a real message to Slack.');

        $webhookUrl = 'https://hooks.slack.com/services/0000/0000/0000';
        $client = new SlackClient($webhookUrl);

        $response = $client->send(new class {
            public function __toString(): string
            {
                return json_encode(['text' => 'Hello, World!']);
            }
        });
    }
}
