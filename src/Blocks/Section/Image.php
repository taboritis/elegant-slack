<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class Image extends Block
{
    private PlainText|Mrkdwn $text;

    public function __construct(
        PlainText|Mrkdwn|string $text,
        private readonly string $imageUrl,
        private readonly string $altText
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize()['text'],
            'accessory' => [
                'type' => 'image',
                'image_url' => $this->imageUrl,
                'alt_text' => $this->altText
            ]
        ];
    }
}
