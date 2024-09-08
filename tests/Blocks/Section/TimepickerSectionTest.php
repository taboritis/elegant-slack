<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\TimepickerSection;

#[CoversClass(TimepickerSection::class)]
class TimepickerSectionTest extends \PHPUnit\Framework\TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(TimepickerSection::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $section = new TimepickerSection(
            'Pick a time',
            'Select a time',
            '13:37',
            'timepicker-action'
        );

        $result = $section->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('text', $result);
        $this->assertArrayHasKey('accessory', $result);
        $this->assertArrayHasKey('type', $result['accessory']);
        $this->assertArrayHasKey('initial_time', $result['accessory']);
        $this->assertArrayHasKey('placeholder', $result['accessory']);
        $this->assertArrayHasKey('action_id', $result['accessory']);
    }
}
