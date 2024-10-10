<?php

declare(strict_types=1);

namespace Tests\Support;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Section\MrkdwnSection;
use Taboritis\ElegantSlack\Blocks\Section\PlainTextSection;
use Taboritis\ElegantSlack\Support\CheckboxOption;
use Taboritis\ElegantSlack\Support\CheckboxWithAction;

#[CoversClass(CheckboxWithAction::class)]
class CheckboxWithActionTest extends TestCase
{
    #[Test]
    public function it_implements_json_serializable_method(): void
    {
        $reflector = new \ReflectionClass(CheckboxWithAction::class);

        $this->assertTrue($reflector->implementsInterface(\JsonSerializable::class));
    }

    #[Test]
    public function it_allows_to_add_an_option(): void
    {
        $checkbox = new CheckboxWithAction('action_123');

        $option1 = new CheckboxOption(new PlainTextSection('Option 1'), 'description', 'value_1');
        $option2 = new CheckboxOption(new MrkdwnSection('*Option 1*'), 'description', 'value_2');

        $checkbox->addOption($option1);
        $checkbox->addOption($option2);

        $expected = [
            'type' => 'checkboxes',
            'options' => [
                $option1->jsonSerialize(),
                $option2->jsonSerialize(),
            ],
            'action_id' => 'action_123',
        ];

        $this->assertSame($expected, $checkbox->jsonSerialize());
    }
}
