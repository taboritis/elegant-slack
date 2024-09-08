<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\Mrkdwn;

#[CoversClass(Mrkdwn::class)]
class MrkdwnTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, new Mrkdwn(fake()->sentence()));
    }

    #[Test]
    public function it_has_markdown_test(): void
    {
        $phrase = fake()->sentence();

        $block = new Mrkdwn($phrase);

        $this->assertArrayHasKey('text', $block->jsonSerialize());
        $this->assertEquals($phrase, $block->jsonSerialize()['text']['text']);
    }
}
