<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Input\Datepicker;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Datepicker::class)]
class DatepickerTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Datepicker::class);

        $this->assertTrue($reflection->isSubclassOf(\Taboritis\ElegantSlack\Blocks\Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $block = new Datepicker(
            'Label',
            'Placeholder',
            '2021-09-01',
            'action-01'
        );

        $result = $block->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('type', $result['element']);
        $this->assertArrayHasKey('placeholder', $result['element']);
        $this->assertArrayHasKey('initial_date', $result['element']);
        $this->assertArrayHasKey('label', $result);
    }
}
