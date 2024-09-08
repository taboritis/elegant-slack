<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Mrkdwn;
use Taboritis\ElegantSlack\Support\Option;
use Taboritis\ElegantSlack\Support\PlainText;

class StaticSelectSection extends Block
{
    private PlainText|Mrkdwn $text;
    private PlainText $placeholder;

    /**
     * @var Option[]
     */
    private array $options = [];

    public function __construct(
        PlainText|Mrkdwn|string $text,
        PlainText|string $placeholder,
        private string $actionId
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;

        return $this;
    }


    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize(),
            'accessory' => [
                'type' => 'static_select',
                'placeholder' => $this->placeholder,
                'options' => array_map(fn(Option $option) => $option->jsonSerialize(), $this->options),
                'action_id' => $this->actionId,
            ],
        ];
    }
}
