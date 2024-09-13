<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Button;
use Taboritis\ElegantSlack\Support\PlainText;

class Timepicker extends Block
{
    private PlainText $placeholder;
    private ?Button $button = null;

    public function __construct(
        private readonly string $initialTime,
        PlainText|string $placeholder,
        private readonly string $actionId
    ) {
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }

    public function jsonSerialize(): array
    {
        $output = [
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'timepicker',
                    'initial_time' => $this->initialTime,
                    'placeholder' => $this->placeholder->jsonSerialize(),
                    'action_id' => $this->actionId
                ],
            ]
        ];

        if ($this->button) {
            $output['elements'][] = $this->button->jsonSerialize();
        }

        return $output;
    }

    public function setButton(Button $button): static
    {
        $this->button = $button;
        return $this;
    }
}
