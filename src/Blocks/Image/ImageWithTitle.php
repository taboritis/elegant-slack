<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Image;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class ImageWithTitle extends Block
{
    private PlainText $title;

    public function __construct(string $title, private readonly string $imageUrl, private readonly string $altText)
    {
        $this->title = new PlainText($title);
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'image',
            'image_url' => $this->imageUrl,
            'alt_text' => $this->altText,
            'title' => $this->title->jsonSerialize(),
        ];
    }
}
