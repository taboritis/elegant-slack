<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class ImageSection extends Block
{
    private PlainTextSection|MrkdwnSection $text;

    public function __construct(
        PlainTextSection|MrkdwnSection|string $text,
        private readonly string $imageUrl,
        private readonly string $altText
    ) {
        $this->text = is_string($text) ? new PlainTextSection($text) : $text;
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
