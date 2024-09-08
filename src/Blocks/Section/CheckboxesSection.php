<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\CheckboxOption;

class CheckboxesSection extends Block
{
    private PlainTextSection|MrkdwnSection $text;

    /**
     * @var CheckboxOption[]
     */
    private array $options = [];

    public function __construct(
        PlainTextSection|MrkdwnSection|string $text,
        private string $actionId
    ) {
        $this->text = is_string($text) ? new PlainTextSection($text) : $text;
    }

    public function addOption(CheckboxOption $option): static
    {
        $this->options[] = $option;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize()['text'],
            'accessory' => [
                'type' => 'checkboxes',
                'options' => array_map(fn(CheckboxOption $option) => $option->jsonSerialize(), $this->options)
            ],
            'action_id' => $this->actionId
        ];
    }
}
