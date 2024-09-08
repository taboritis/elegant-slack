<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class MrkdwnSection extends Block
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
