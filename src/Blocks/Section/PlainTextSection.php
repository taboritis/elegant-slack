<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Stringable;
use Taboritis\ElegantSlack\Blocks\Block;

class PlainTextSection extends Block implements Stringable
{
    public function __construct(private readonly string $phrase, private readonly bool $emoji = true)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => [
                'type' => 'plain_text',
                'text' => $this->phrase,
                'emoji' => $this->emoji,
            ],
        ];
    }

    public function __toString(): string
    {
        if ($this->phrase === '') {
            throw new \RuntimeException('The phrase cannot be empty.');
        }

        $json = json_encode(['text' => $this->phrase]);

        if ($json === false) {
            throw new \RuntimeException('Failed to encode JSON: ' . json_last_error_msg());
        }

        return $json;
    }
}
