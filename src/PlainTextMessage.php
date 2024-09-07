<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages;

use Stringable;

class PlainTextMessage implements Stringable
{
    private string $text = '';

    public function add(string $string): static
    {
        $this->text .= $string;

        return $this;
    }

    public function __toString(): string
    {
        if ($this->text === '') {
            throw new \InvalidArgumentException('Cannot convert an empty PlainTextMessage to a string');
        }

        return $this->text;
    }
}
