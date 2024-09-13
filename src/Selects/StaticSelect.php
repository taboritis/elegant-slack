<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

use Taboritis\ElegantSlack\Support\Option;

class StaticSelect extends Select
{
    /**
     * @var array<int, Option>
     */
    private array $options = [];

    public function jsonSerialize(): array
    {
        return [
            'type' => 'static_select',
            'placeholder' => $this->placeholder->jsonSerialize(),
            'options' => array_map(fn(Option $option) => $option->jsonSerialize(), $this->options),
            'action_id' => $this->actionId
        ];
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;
        return $this;
    }
}
