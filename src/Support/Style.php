<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

enum Style: string
{
    case BOLD = 'bold';
    case ITALIC = 'italic';
    case STRIKETHROUGH = 'strike';
    case EMOJI = 'emoji';
}
