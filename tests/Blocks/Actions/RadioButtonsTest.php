<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\RadioButtons;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(RadioButtons::class)]
class RadioButtonsTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(RadioButtons::class);

        $this->assertTrue($reflection->isSubclassOf(\Taboritis\ElegantSlack\Blocks\Block::class));
    }

    #[Test]
    public function add_option()
    {
        $radioButtons = new RadioButtons('action_1');
        $option = new Option('Option 1', 'value_1');

        $radioButtons->addOption($option);

        $this->assertCount(1, $radioButtons->jsonSerialize()['elements'][0]['options']);
    }
}
