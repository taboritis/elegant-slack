<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\RadioButtonsSection;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(RadioButtonsSection::class)]
class RadioButtonsSectionTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(RadioButtonsSection::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $section = new RadioButtonsSection(
            text: 'This is a section with radio buttons',
            actionId: 'radio_buttons_section'
        );

        $result = $section->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('text', $result);
        $this->assertArrayHasKey('accessory', $result);
        $this->assertArrayHasKey('type', $result['accessory']);
        $this->assertArrayHasKey('options', $result['accessory']);
        $this->assertArrayHasKey('action_id', $result['accessory']);
    }

    #[Test]
    public function it_allows_to_add_option(): void
    {
        $section = new RadioButtonsSection(
            text: 'This is a section with radio buttons',
            actionId: 'radio_buttons_section'
        );

        $this->assertCount(0, $section->jsonSerialize()['accessory']['options']);

        $section->addOption(new Option('option1', 'value-1'));

        $this->assertCount(1, $section->jsonSerialize()['accessory']['options']);
    }
}
