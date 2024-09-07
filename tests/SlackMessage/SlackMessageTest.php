<?php

declare(strict_types=1);

namespace Taboritis\tests\ElegantMessage;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlackMessages\Blocks\Section\Mrkdwn;
use Taboritis\ElegantSlackMessages\Blocks\Section\PlainText;
use Taboritis\ElegantSlackMessages\SlackMessage;

#[CoversClass(SlackMessage::class)]
class SlackMessageTest extends TestCase
{
    private SlackMessage $message;

    protected function setUp(): void
    {
        parent::setUp();
        $this->message = new SlackMessage();
    }

    #[Test]
    public function it_is_stringable(): void
    {
        $this->assertIsString((string)$this->message);
    }

    #[Test]
    public function it_allows_to_add_block(): void
    {
        $phrase = fake()->sentence();

        $this->message->addBlock(new PlainText($phrase));

        $json = $this->message->__toString();

        $this->assertJson($json);
        $this->assertStringContainsString($phrase, $json);
    }

    #[Test]
    public function it_is_chainable(): void
    {
        $block = new Mrkdwn(fake()->sentence());

        $this->assertInstanceOf(SlackMessage::class, $this->message->addBlock($block));
    }
}
