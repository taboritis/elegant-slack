<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class ButtonSection extends Block
{
    private PlainTextSection|MrkdwnSection|string $section;
    private PlainTextSection|MrkdwnSection|string $buttonText;

    public function __construct(
        PlainTextSection|MrkdwnSection|string $section,
        PlainTextSection|MrkdwnSection|string $buttonText,
        private readonly string $value,
        private readonly string $actionId
    ) {
        $this->section = is_string($section) ? new PlainTextSection($section) : $section;
        $this->buttonText = is_string($buttonText) ? new PlainTextSection($buttonText) : $buttonText;
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
