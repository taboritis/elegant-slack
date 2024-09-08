<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\MultiConversationsSelectSection;

#[CoversClass(MultiConversationsSelectSection::class)]
class MultiConversationsSelectSectionTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(MultiConversationsSelectSection::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_converts_to_section_array(): void
    {
        $section = new MultiConversationsSelectSection(
            text: 'Choose a conversation',
            placeholder: 'Select a conversation',
            actionId: 'multi_convo_select'
        );

        $result = $section->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('text', $result);
        $this->assertArrayHasKey('accessory', $result);
        $this->assertArrayHasKey('type', $result['accessory']);
        $this->assertArrayHasKey('placeholder', $result['accessory']);
        $this->assertArrayHasKey('action_id', $result['accessory']);
    }
}
