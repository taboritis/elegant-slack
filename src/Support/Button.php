<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

class Button implements \JsonSerializable
{
    private PlainText $text;

    public function __construct(PlainText|string $text, private string $value, private string $actionId)
    {
        $this->text = is_string($text) ? new PlainText($text) : $text;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'button',
            'text' => $this->text->jsonSerialize(),
            'value' => $this->value,
            'action_id' => $this->actionId,
        ];
    }
}
