<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\Checkboxes;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(Checkboxes::class)]
class CheckboxesTest extends TestCase
{
    #[Test]
    public function it_(): void
    {
        $reflection = new \ReflectionClass(Checkboxes::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $checkboxes = new Checkboxes(
            'Label',
            'action-01',
            'value-01'
        );

        $result = $checkboxes->jsonSerialize();

        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('options', $result['element']);
        $this->assertArrayHasKey('type', $result['element']);
        $this->assertArrayHasKey('action_id', $result['element']);
        $this->assertArrayHasKey('label', $result);
    }

    #[Test]
    public function it_allows_to_add_an_option(): void
    {
        $checkboxes = new Checkboxes(
            'Label',
            'action-01',
        );

        $checkboxes->addOption(new Option('Option 1', 'value-01'));

        $this->assertEquals('plain_text', $checkboxes->jsonSerialize()['element']['options'][0]['type']);
    }
}
