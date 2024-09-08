<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\MrkdwnSection;

#[CoversClass(MrkdwnSection::class)]
class MrkdwnTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, new MrkdwnSection(fake()->sentence()));
    }

    #[Test]
    public function it_has_markdown_test(): void
    {
        $phrase = fake()->sentence();

        $block = new MrkdwnSection($phrase);

        $this->assertArrayHasKey('text', $block->jsonSerialize());
        $this->assertEquals($phrase, $block->jsonSerialize()['text']['text']);
    }
}
