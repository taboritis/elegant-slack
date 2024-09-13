<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

class Datepicker implements \JsonSerializable
{
    private PlainText $placeholder;

    public function __construct(
        PlainText|string $placeholder,
        private readonly string $initialDate,
        private readonly string $actionId
    ) {
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'datepicker',
            'initial_date' => $this->initialDate,
            'placeholder' => $this->placeholder->jsonSerialize(),
            'action_id' => $this->actionId
        ];
    }
}
