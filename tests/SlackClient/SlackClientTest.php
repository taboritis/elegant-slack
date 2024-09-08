<?php

declare(strict_types=1);

namespace Tests\SlackClient;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Section\ButtonSection;
use Taboritis\ElegantSlack\Blocks\Section\PlainTextSection;
use Taboritis\ElegantSlack\SlackClient;
use Taboritis\ElegantSlack\SlackMessage;

#[CoversClass(SlackClient::class)]
class SlackClientTest extends TestCase
{
    private SlackClient $client;
    private SlackMessage $message;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new SlackClient($_ENV['SLACK_WEBHOOK_URL']);
        $this->message = new SlackMessage();
    }

    #[Test]
    public function it_allows_to_send_plain_text(): void
    {
        $this->markTestSkipped('This test is skipped because it sends a real message to Slack.');

        $message = new PlainTextSection('Tu jestem!');

        $response = $this->client->send($message);

        $this->assertEquals('ok', $response);
    }

    #[Test]
    public function it_sends_an_elegant_message(): void
    {
        $this->markTestSkipped('This test is skipped because it sends a real message to Slack.');

        $block = new ButtonSection(
            'Click me',
            'https://example.com',
            'primary',
            'button-123'
        );

        $this->message->addBlock($block);

        $response = $this->client->send($this->message);

        $this->assertEquals('ok', $response);
    }
}
