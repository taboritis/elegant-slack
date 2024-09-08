<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Mrkdwn;
use Taboritis\ElegantSlack\Support\Option;
use Taboritis\ElegantSlack\Support\PlainText;

class OverflowSection extends Block
{
    /**
     * @var array<Option>
     */
    private array $options = [];

    private PlainText|Mrkdwn $text;

    public function __construct(PlainText|Mrkdwn|string $text, private readonly string $actionId)
    {
        $this->text = is_string($text) ? new PlainText($text) : $text;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'section',
            'text' => $this->text,
            'accessory' => [
                'type' => 'overflow',
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
