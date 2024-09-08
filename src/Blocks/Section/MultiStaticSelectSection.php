<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Mrkdwn;
use Taboritis\ElegantSlack\Support\Option;
use Taboritis\ElegantSlack\Support\PlainText;

class MultiStaticSelectSection extends Block
{
    private PlainText|Mrkdwn $text;
    private PlainText|Mrkdwn $placeholder;

    /** @var array<Option> */
    private array $options = [];

    public function __construct(
        PlainText|Mrkdwn|string $text,
        PlainText|Mrkdwn|string $placeholder,
        private readonly string $actionId,
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text->jsonSerialize(),
            'accessory' => [
                'type' => 'multi_static_select',
                'placeholder' => $this->placeholder->jsonSerialize(),
                'options' => array_map(fn(Option $option) => $option->jsonSerialize(), $this->options),
                'action_id' => $this->actionId,
            ],
        ];
    }

    public function addOption(Option $option): static
    {
        $this->options[] = $option;
        return $this;
    }
}
