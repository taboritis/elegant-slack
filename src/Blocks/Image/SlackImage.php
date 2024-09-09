<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Image;

use Taboritis\ElegantSlack\Blocks\Block;

class SlackImage extends Block
{
    public function __construct(private string $url, private string $altText)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'image',
            'slack_file' => [
                'url' => $this->url,
            ],
            'alt_text' => $this->altText,
        ];
    }
}
