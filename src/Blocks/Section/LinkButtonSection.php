<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class LinkButtonSection extends Block
{
    private PlainTextSection|MrkdwnSection $text;
    private PlainTextSection|MrkdwnSection $buttonText;

    public function __construct(
        PlainTextSection|MrkdwnSection|string $text,
        PlainTextSection|MrkdwnSection|string $buttonText,
        private readonly string $url,
        private readonly string $value,
        private readonly string $actionId
    ) {
        $this->text = is_string($text) ? new PlainTextSection($text) : $text;
        $this->buttonText = is_string($buttonText) ? new PlainTextSection($buttonText) : $buttonText;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize()['text'],
            'accessory' => [
                'type' => 'button',
                'text' => $this->buttonText->jsonSerialize()['text'],
                'url' => $this->url,
                'action_id' => $this->actionId,
                'value' => $this->value
            ]
        ];
    }
}
