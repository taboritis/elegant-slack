<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Mrkdwn;
use Taboritis\ElegantSlack\Support\PlainText;

class MultiConversationsSelectSection extends Block
{
    private PlainText|Mrkdwn $text;
    private PlainText $placeholder;

    public function __construct(
        PlainText|Mrkdwn|string $text,
        PlainText|string $placeholder,
        private readonly string $actionId
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
        $this->placeholder = $placeholder instanceof PlainText ? $placeholder : new PlainText($placeholder);
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize(),
            'accessory' => [
                'type' => 'multi_conversations_select',
                'placeholder' => $this->placeholder->jsonSerialize(),
                'action_id' => $this->actionId,
            ],
        ];
    }
}
