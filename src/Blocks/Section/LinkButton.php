<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class LinkButton extends Block
{
    private PlainText|Mrkdwn $text;
    private PlainText|Mrkdwn $buttonText;

    public function __construct(
        PlainText|Mrkdwn|string $text,
        PlainText|Mrkdwn|string $buttonText,
        private readonly string $url,
        private readonly string $value,
        private readonly string $actionId
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
        $this->buttonText = is_string($buttonText) ? new PlainText($buttonText) : $buttonText;
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
