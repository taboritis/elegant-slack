<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\RichText\Formatted;

use Taboritis\ElegantSlack\Support\Style;

readonly class Italic implements FormattedText
{
    public function __construct(private string $value)
    {
    }

    public function getStyle(): Style
    {
        return Style::ITALIC;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
