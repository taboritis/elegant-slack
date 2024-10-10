<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class Button extends Block
{
    private PlainText $text;

    public function __construct(
        PlainText|string $text,
        private readonly string $action_id,
        private readonly string $value
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'actions',
            'text' => $this->text,
            'action_id' => $this->action_id,
            'value' => $this->value,
        ];
    }
}
