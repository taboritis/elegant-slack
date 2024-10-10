<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\RichText;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\FormattedText;
use Taboritis\ElegantSlack\Support\Style;

class RichTextSection extends Block
{
    /**
     * @var array<int, mixed>
     */
    private array $elements = [];

    public function jsonSerialize(): array
    {
        return [
            'type' => 'rich_text',
            'elements' => [
                [
                    'type' => 'rich_text_section',
                    'elements' => $this->elements,
                ],
            ],
        ];
    }

    public function addText(string $text): static
    {
        $this->elements[] = [
            'type' => 'text',
            'text' => $text,
        ];
        return $this;
    }

    public function addBold(string $text): static
    {
        $this->elements[] = [
            'type' => 'text',
            'text' => $text,
            'style' => [
                'bold' => true,
            ],
        ];

        return $this;
    }

    public function addItalic(string $text): static
    {
        $this->elements[] = [
            'type' => 'text',
            'text' => $text,
            'style' => [
                'italic' => true,
            ],
        ];

        return $this;
    }

    public function addStrikethrough(string $text): static
    {
        $this->elements[] = [
            'type' => 'text',
            'text' => $text,
            'style' => [
                'strikethrough' => true,
            ],
        ];

        return $this;
    }

    public function addEmoji(string $text): static
    {
        $this->elements[] = [
            'type' => 'emoji',
            'name' => $text,
        ];

        return $this;
    }

    public function addFormattedText(FormattedText $formattedText): static
    {
        if ($formattedText->getStyle() === Style::EMOJI) {
            $this->elements[] = [
                'type' => 'emoji',
                'name' => $formattedText->getValue(),
            ];

            return $this;
        }

        $this->elements[] = [
            'type' => 'text',
            'text' => $formattedText->getValue(),
            'style' => [
                $formattedText->getStyle()->value => true,
            ],
        ];

        return $this;
    }
}
