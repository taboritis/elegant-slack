<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

use JsonSerializable;
use Taboritis\ElegantSlack\Blocks\Section\Mrkdwn;
use Taboritis\ElegantSlack\Blocks\Section\PlainText;

class CheckboxOption implements JsonSerializable
{
    private PlainText|Mrkdwn|string $text;
    private PlainText|Mrkdwn|string $description;

    public function __construct(
        PlainText|Mrkdwn|string $text,
        PlainText|Mrkdwn|string $description,
        private readonly string $value
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
        $this->description = is_string($description) ? new PlainText($description) : $description;
    }

    public function jsonSerialize(): array
    {
        return [
            'text' => $this->text->jsonSerialize()['text'],
            'description' => $this->description->jsonSerialize()['text'],
            'value' => $this->value,
        ];
    }
}
