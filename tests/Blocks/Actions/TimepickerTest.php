<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\Timepicker;
use Taboritis\ElegantSlack\Support\Button;

#[CoversClass(Timepicker::class)]
class TimepickerTest extends TestCase
{
    #[Test]
    public function json_serialize_returns_correct_structure(): void
    {
        $timepicker = new Timepicker('12:00', 'Select time', 'action_1');
        $expected = [
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'timepicker',
                    'initial_time' => '12:00',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Select time',
                        'emoji' => true,
                    ],
                    'action_id' => 'action_1',
                ],
            ],
        ];

        $this->assertSame($expected, $timepicker->jsonSerialize());
    }

    #[Test]
    public function it_allows_to_add_an_button(): void
    {
        $timepicker = new Timepicker('12:00', 'Test', 'action_1');

        $timepicker->setButton(new Button('Click me', 'value_1', 'action_1'));

        $expected = [
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'timepicker',
                    'initial_time' => '12:00',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Test',
                        'emoji' => true,
                    ],
                    'action_id' => 'action_1',
                ],
                [
                    'type' => 'button',
                    'text' => [
                        'type' => 'plain_text',
                        'text' => 'Click me',
                        'emoji' => true,
                    ],
                    'value' => 'value_1',
                    'action_id' => 'action_1',
                ],
            ],
        ];

        $this->assertSame($expected, $timepicker->jsonSerialize());
    }
}
