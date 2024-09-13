<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Option;
use Taboritis\ElegantSlack\Support\PlainText;

class MultiStaticSelect extends Block
{
    private PlainText $placeholder;
    private PlainText $label;

    /** @var Option[] */
    private array $options = [];

    public function __construct(
        PlainText|string $placeholder,
        PlainText|string $label,
        private readonly string $actionId
    ) {
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
        $this->label = is_string($label) ? new PlainText($label) : $label;
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'input',
            'element' => [
                'type' => 'multi_static_select',
                'placeholder' => $this->placeholder->jsonSerialize(),
                'options' => array_map(fn(Option $option) => $option->jsonSerialize(), $this->options),
                'action_id' => $this->actionId,
            ],
            'label' => $this->label->jsonSerialize(),
        ];
    }
}
