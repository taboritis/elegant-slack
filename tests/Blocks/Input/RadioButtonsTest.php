<?php

declare(strict_types=1);

namespace Tests\Blocks\Input;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Input\RadioButtons;

#[CoversClass(RadioButtons::class)]
class RadioButtonsTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(RadioButtons::class);
        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function assert_that_array_has_keys(): void
    {
        $radioButtons = new RadioButtons('label', 'actionId');
        $result = $radioButtons->jsonSerialize();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('type', $result);
        $this->assertArrayHasKey('element', $result);
        $this->assertArrayHasKey('label', $result);
    }
}
