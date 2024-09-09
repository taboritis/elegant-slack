<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Image;

use Taboritis\ElegantSlack\Blocks\Block;

class Image extends Block
{
    public function __construct(private readonly string $imageUrl, private readonly string $altText)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'image',
            'image_url' => $this->imageUrl,
            'alt_text' => $this->altText,
        ];
    }
}
