<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages\Blocks\Section;

use Taboritis\ElegantSlackMessages\Blocks\Block;

class TextFields extends Block
{
    /**
     * @var PlainText[]
     */
    private array $texts = [];

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'fields' => array_map(fn(PlainText $text) => $text->jsonSerialize()['text'], $this->texts),
        ];
    }

    public function addPlainText(PlainText|string $text): static
    {
        $this->texts[] = is_string($text) ? new PlainText($text) : $text;

        return $this;
    }
}
