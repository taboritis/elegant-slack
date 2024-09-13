<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\SelectWithInitialOptions;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Selects\ConversationsSelect;

#[CoversClass(SelectWithInitialOptions::class)]
class SelectWithInitialOptionsTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(SelectWithInitialOptions::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function allows_add_an_select(): void
    {
        $selects = new SelectWithInitialOptions();

        $selects->addSelect(new ConversationsSelect('test', 'action-01'), 'initial_value');

        $this->assertSame([
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'conversations_select',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'test',
                        'emoji' => true
                    ],
                    'action_id' => 'action-01',
                    'initial_conversation' => 'initial_value'
                ]
            ]
        ], $selects->jsonSerialize());
    }
}
