<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

readonly class Image implements \JsonSerializable
{
    public function __construct(private string $url, private string $altText)
    {
    }

    /**
     * @return array<string, string>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'image',
            'image_url' => $this->url,
            'alt_text' => $this->altText,
        ];
    }
}
