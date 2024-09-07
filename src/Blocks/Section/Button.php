<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages\Blocks\Section;

use Taboritis\ElegantSlackMessages\Blocks\Block;

class Button extends Block
{
    private PlainText|Mrkdwn|string $section;
    private PlainText|Mrkdwn|string $buttonText;

    public function __construct(
        PlainText|Mrkdwn|string $section,
        PlainText|Mrkdwn|string $buttonText,
        private readonly string $value,
        private readonly string $actionId
    ) {
        $this->section = is_string($section) ? new PlainText($section) : $section;
        $this->buttonText = is_string($buttonText) ? new PlainText($buttonText) : $buttonText;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->section->jsonSerialize()['text'], // @phpstan-ignore-line
            'accessory' => [
                'type' => 'button',
                'text' => $this->buttonText->jsonSerialize()['text'], // @phpstan-ignore-line
                'value' => $this->value,
                'action_id' => $this->actionId
            ]
        ];
    }
}
