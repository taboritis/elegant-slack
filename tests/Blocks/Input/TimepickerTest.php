<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\Timepicker;

#[CoversClass(Timepicker::class)]
class TimepickerTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Timepicker::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_an_array(): void
    {
        $timepicker = new Timepicker(
            'placeholder',
            'label',
            '15:31',
            'actionId'
        );
        $this->assertIsArray($timepicker->jsonSerialize());

        $this->assertArrayHasKey('type', $timepicker->jsonSerialize());
        $this->assertArrayHasKey('element', $timepicker->jsonSerialize());
        $this->assertArrayHasKey('label', $timepicker->jsonSerialize());
        $this->assertArrayHasKey('type', $timepicker->jsonSerialize()['element']);
        $this->assertArrayHasKey('initial_time', $timepicker->jsonSerialize()['element']);
        $this->assertArrayHasKey('action_id', $timepicker->jsonSerialize()['element']);
    }
}
