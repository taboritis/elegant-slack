<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class PlainTextInput extends Block
{
    private PlainText $label;

    public function __construct(PlainText|string $label, private readonly string $actionId)
    {
        $this->label = is_string($label) ? new PlainText($label) : $label;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'input',
            'element' => [
                'type' => 'plain_text_input',
                'action_id' => $this->actionId,
            ],
            'label' => $this->label->jsonSerialize(),
        ];
    }
}
