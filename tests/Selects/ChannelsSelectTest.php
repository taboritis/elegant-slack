<?php

declare(strict_types=1);

namespace Tests\Selects;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Selects\ChannelsSelect;
use Taboritis\ElegantSlack\Selects\Select;

#[CoversClass(ChannelsSelect::class)]
class ChannelsSelectTest extends TestCase
{
    #[Test]
    public function it_extends_a_select(): void
    {
        $reflector = new \ReflectionClass(ChannelsSelect::class);

        $this->assertTrue($reflector->isSubclassOf(Select::class));
    }

    #[Test]
    public function it_returns_an_array(): void
    {
        $select = new ChannelsSelect('Choose a conversation', 'action-id');

        $this->assertIsArray($select->jsonSerialize());

        $this->assertArrayHasKey('type', $select->jsonSerialize());
        $this->assertArrayHasKey('placeholder', $select->jsonSerialize());
        $this->assertArrayHasKey('action_id', $select->jsonSerialize());
    }
}
