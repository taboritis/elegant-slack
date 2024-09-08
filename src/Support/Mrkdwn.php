<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

use JsonSerializable;

readonly class Mrkdwn implements JsonSerializable
{
    public function __construct(private string $text)
    {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'type' => 'mrkdwn',
            'text' => $this->text,
        ];
    }
}
