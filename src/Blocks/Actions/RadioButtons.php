<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Option;

class RadioButtons extends Block
{
    /**
     * @var Option[]
     */
    private array $options = [];

    public function __construct(private readonly string $actionId)
    {
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            "type" => "actions",
            "elements" => [
                [
                    "type" => "radio_buttons",
                    "options" => array_map(fn(Option $option) => $option->jsonSerialize(), $this->options),
                    "action_id" => $this->actionId
                ]
            ]
        ];
    }
}
