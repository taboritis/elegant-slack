<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\RichText\Formatted;

use Taboritis\ElegantSlack\Support\Style;

interface FormattedText
{
    public function getValue(): string;

    public function getStyle(): Style;
}
