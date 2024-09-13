<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class Timepicker extends Block
{
    private PlainText $placeholder;
    private PlainText $label;

    public function __construct(
        PlainText|string $placeholder,
        PlainText|string $label,
        private readonly string $initialTime,
        private readonly string $actionId,
    ) {
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
        $this->label = is_string($label) ? new PlainText($label) : $label;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'input',
            'element' => [
                'type' => 'timepicker',
                'initial_time' => $this->initialTime,
                'placeholder' => $this->placeholder,
                'action_id' => $this->actionId,
            ],
            'label' => $this->label,
        ];
    }
}
