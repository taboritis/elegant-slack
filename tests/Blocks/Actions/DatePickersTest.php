<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\DatePickers;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Datepicker;

#[CoversClass(DatePickers::class)]
class DatePickersTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflector = new \ReflectionClass(DatePickers::class);

        $this->assertTrue($reflector->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_sets_a_first_datepicker(): void
    {
        $firstDatepicker = new Datepicker('Select a date', $initialDate = fake()->date(), 'actionId-0');
        $datePickers = new DatePickers($firstDatepicker);

        $this->assertSame($initialDate, $datePickers->jsonSerialize()['elements'][0]['initial_date']);
    }

    #[Test]
    public function it_allows_to_add_a_datepicker(): void
    {
        $firstDatepicker = new Datepicker('Select a date', fake()->date(), 'actionId-0');
        $datePickers = new DatePickers($firstDatepicker);

        $secondDatepicker = new Datepicker('Select another date', $anotherDate = fake()->date(), 'actionId-1');
        $datePickers->addDatepicker($secondDatepicker);

        $this->assertSame($anotherDate, $datePickers->jsonSerialize()['elements'][1]['initial_date']);
    }
}
