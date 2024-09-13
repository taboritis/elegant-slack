<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Support;

class CheckboxWithAction implements \JsonSerializable
{
    /**
     * @var  array<int, CheckboxOption> $options
     */
    protected array $options = [];

    public function __construct(private readonly string $actionId)
    {
    }

    public function addOption(CheckboxOption $option): static
    {
        $this->options[] = $option;

        return $this;
    }


    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'checkboxes',
            'options' => array_map(fn($option) => $option->jsonSerialize(), $this->options),
            'action_id' => $this->actionId,
        ];
    }
}
