<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Divider;

use Taboritis\ElegantSlack\Blocks\Block;

class Divider extends Block
{
    public function jsonSerialize(): array
    {
        return [
            'type' => 'divider',
        ];
    }
}
