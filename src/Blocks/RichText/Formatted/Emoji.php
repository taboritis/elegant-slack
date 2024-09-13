<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\RichText\Formatted;

use Taboritis\ElegantSlack\Support\Style;

readonly class Emoji implements FormattedText
{
    public function __construct(private string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getStyle(): Style
    {
        return Style::EMOJI;
    }
}
