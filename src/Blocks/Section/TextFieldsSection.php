<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class TextFieldsSection extends Block
{
    /**
     * @var PlainTextSection[]
     */
    private array $texts = [];

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'fields' => array_map(fn(PlainTextSection $text) => $text->jsonSerialize()['text'], $this->texts),
        ];
    }

    public function addPlainText(PlainTextSection|string $text): static
    {
        $this->texts[] = is_string($text) ? new PlainTextSection($text) : $text;

        return $this;
    }
}
