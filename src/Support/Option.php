<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

use JsonSerializable;

class Option implements JsonSerializable
{
    private readonly PlainText $text;

    public function __construct(PlainText|string $text, private readonly string $value)
    {
        $this->text = is_string($text) ? new PlainText($text) : $text;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'text' => $this->text->jsonSerialize(),
            'value' => $this->value,
        ];
    }
}
