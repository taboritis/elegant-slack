<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\RichText;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\RichText\Formatted\FormattedText;

class RichTextList extends Block
{
    /**
     * @var array<int, mixed>
     */
    private array $elements = [];

    public function __construct(private readonly string $style)
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'rich_text',
            'elements' => [
                'type' => 'rich_text_list',
                'style' => $this->style,
                'elements' => [
                    [
                        'type' => 'rich_text_section',
                        'elements' => $this->elements,
                    ]
                ]
            ],
        ];
    }

    public function addElement(FormattedText|string $formattedText): static
    {
        if (is_string($formattedText)) {
            $this->elements[] = [
                'type' => 'text',
                'text' => $formattedText,
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
