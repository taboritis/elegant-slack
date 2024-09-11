<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Option;
use Taboritis\ElegantSlack\Support\PlainText;

class Checkboxes extends Block
{
    private PlainText $label;

    /**
     * @var Option[]
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
                'type' => 'checkboxes',
                'options' => array_map(fn(Option $option) => $option->jsonSerialize()['text'], $this->options),
                'action_id' => $this->actionId,
            ],
            'label' => $this->label->jsonSerialize()
        ];
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;
        return $this;
    }
}
