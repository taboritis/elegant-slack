<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Option;
use Taboritis\ElegantSlack\Support\PlainText;

class RadioButtons extends Block
{
    private PlainText $label;
    /**
     * @var array<Option>
     */
    private array $options = [];

    public function __construct(PlainText|string $label, private readonly string $actionId)
    {
        $this->label = is_string($label) ? new PlainText($label) : $label;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'input',
            'element' => [
                'type' => 'radio_buttons',
                'options' => array_map(fn(Option $option) => $option->jsonSerialize(), $this->options),
                'action_id' => $this->actionId,
            ],
            'label' => $this->label->jsonSerialize(),
        ];
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;
        return $this;
    }
}
