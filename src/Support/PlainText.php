<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

use JsonSerializable;

readonly class PlainText implements JsonSerializable
{
    public function __construct(
        private string $text,
        private bool $emoji = false
    ) {
    }

    /**
     * @return array{type: string, text: string, emoji: bool}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'plain_text',
            'text' => $this->text,
            'emoji' => $this->emoji,
        ];
    }
}
