<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Actions\FilteredConversationsSelect;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;

#[CoversClass(FilteredConversationsSelect::class)]
class FilteredConversationsSelectTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(FilteredConversationsSelect::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $select = new FilteredConversationsSelect('Select a conversation', 'select_conversation');

        $this->assertSame([
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'conversations_select',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Select a conversation',
                        'emoji' => true,
                    ],
                    'filter' => [
                        'include' => ['private'],
                    ],
                    'action_id' => 'select_conversation',
                ],
            ],
        ], $select->jsonSerialize());
    }
}
