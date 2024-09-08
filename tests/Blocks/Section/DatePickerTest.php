<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\DatePicker;

#[CoversClass(DatePicker::class)]
class DatePickerTest extends TestCase
{
    private DatePicker $datePicker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->datePicker = new DatePicker(
            text: 'date picker',
            initialDate: '2024-10-10',
            placeholder: 'Select a date',
            actionId: 'datepicker-action'
        );
    }

    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, $this->datePicker);
    }

    #[Test]
    public function it_can_be_converted_to_data_picker_structure(): void
    {
        $result = $this->datePicker->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('text', $result);
        $this->assertArrayHasKey('accessory', $result);
        $this->assertArrayHasKey('type', $result['accessory']);
        $this->assertArrayHasKey('initial_date', $result['accessory']);
        $this->assertArrayHasKey('placeholder', $result['accessory']);
        $this->assertArrayHasKey('action_id', $result['accessory']);
    }
}
