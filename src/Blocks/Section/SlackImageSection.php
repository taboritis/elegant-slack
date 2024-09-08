<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Mrkdwn;
use Taboritis\ElegantSlack\Support\PlainText;

class SlackImageSection extends Block
{
    private PlainText|Mrkdwn $text;

    public function __construct(
        PlainText|Mrkdwn|string $text,
        private string $imageUrl,
        private string $altText
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize(),
            'accessory' => [
                'type' => 'image',
                'slack_file' => [
                    'url' => $this->imageUrl,
                ],
                'alt_text' => $this->altText,
            ],
        ];
    }
}
