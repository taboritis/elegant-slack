<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Header;

use Taboritis\ElegantSlack\Blocks\Block;

class Header extends Block
{
    public function __construct(private readonly string $text, private readonly bool $emoji = true)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'header',
            'text' => [
                'type' => 'plain_text',
                'text' => $this->text,
                'emoji' => $this->emoji,
            ],
        ];
    }
}
