<?php

declare(strict_types=1);

namespace Tests\Selects;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Selects\Select;
use Taboritis\ElegantSlack\Selects\StaticSelect;
use Taboritis\ElegantSlack\Support\Option;

#[CoversClass(StaticSelect::class)]
class StaticSelectTest extends TestCase
{
    #[Test]
    public function it_extends_a_select(): void
    {
        $reflector = new \ReflectionClass(StaticSelect::class);

        $this->assertTrue($reflector->isSubclassOf(Select::class));
    }

    #[Test]
    public function it_returns_an_array(): void
    {
        $select = new StaticSelect('Choose a conversation', 'action-id');

        $this->assertIsArray($select->jsonSerialize());

        $this->assertArrayHasKey('type', $select->jsonSerialize());
        $this->assertArrayHasKey('placeholder', $select->jsonSerialize());
        $this->assertArrayHasKey('action_id', $select->jsonSerialize());
    }

    #[Test]
    public function it_allows_to_add_an_option(): void
    {
        $select = new StaticSelect('Choose a conversation', 'action-id');

        $select->addOption(new Option('option 1', 'value 1'));

        $this->assertArrayHasKey('options', $select->jsonSerialize());
        $this->assertCount(1, $select->jsonSerialize()['options']);
        $this->assertArrayHasKey('text', $select->jsonSerialize()['options'][0]);
        $this->assertArrayHasKey('value', $select->jsonSerialize()['options'][0]);
    }
}
