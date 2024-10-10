<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\AllSelects;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Selects\ConversationsSelect;

#[CoversClass(AllSelects::class)]
class AllSelectsTest extends TestCase
{
    #[Test]
    public function it_extends_block(): void
    {
        $reflector = new \ReflectionClass(AllSelects::class);

        $this->assertTrue($reflector->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_allows_to_add_an_select(): void
    {
        $selects = new AllSelects();

        $selects->addSelect(new ConversationsSelect('Select a conversation', 'actionId-0'));

        $this->assertArrayHasKey('elements', $selects->jsonSerialize());
        $this->assertCount(1, $selects->jsonSerialize()['elements']);
        $this->assertArrayHasKey('type', $selects->jsonSerialize()['elements'][0]);
        $this->assertArrayHasKey('placeholder', $selects->jsonSerialize()['elements'][0]);
        $this->assertArrayHasKey('action_id', $selects->jsonSerialize()['elements'][0]);
    }
}
