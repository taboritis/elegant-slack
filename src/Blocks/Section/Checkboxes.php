<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\CheckboxOption;

class Checkboxes extends Block
{
    private PlainText|Mrkdwn $text;

    /**
     * @var CheckboxOption[]
     */
    private array $options = [];

    public function __construct(
        PlainText|Mrkdwn|string $text,
        private string $actionId
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
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
