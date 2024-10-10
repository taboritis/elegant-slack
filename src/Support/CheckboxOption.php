<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

use JsonSerializable;
use Taboritis\ElegantSlack\Blocks\Section\MrkdwnSection;
use Taboritis\ElegantSlack\Blocks\Section\PlainTextSection;

class CheckboxOption implements JsonSerializable
{
    private PlainTextSection|MrkdwnSection $text;
    private PlainTextSection|MrkdwnSection $description;

    public function __construct(
        PlainTextSection|MrkdwnSection|string $text,
        PlainTextSection|MrkdwnSection|string $description,
        private readonly string $value
    ) {
        $this->text = is_string($text) ? new PlainTextSection($text) : $text;
        $this->description = is_string($description) ? new PlainTextSection($description) : $description;
    }


    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'text' => $this->text->jsonSerialize()['text'],
            'description' => $this->description->jsonSerialize()['text'],
            'value' => $this->value,
        ];
    }
}
