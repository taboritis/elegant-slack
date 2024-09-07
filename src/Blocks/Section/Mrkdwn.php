<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages\Blocks\Section;

use Taboritis\ElegantSlackMessages\Blocks\Block;

class Mrkdwn extends Block
{
    public function __construct(private readonly string $mrkdwnText)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => [
                'type' => 'mrkdwn',
                'text' => $this->mrkdwnText
            ]
        ];
    }
}
