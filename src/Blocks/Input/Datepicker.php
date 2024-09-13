<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class Datepicker extends Block
{
    private PlainText $label;
    private PlainText $placeholder;

    public function __construct(
        PlainText|string $label,
        PlainText|string $placeholder,
        private readonly string $initialDate,
        private readonly string $actionId
    ) {
        $this->label = is_string($label) ? new PlainText($label) : $label;
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'input',
            'element' => [
                'type' => 'datepicker',
                'placeholder' => $this->placeholder->jsonSerialize(),
                'initial_date' => $this->initialDate,
                'action_id' => $this->actionId,
            ],
            'label' => $this->label->jsonSerialize()
        ];
    }
}
