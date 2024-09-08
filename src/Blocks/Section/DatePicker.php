<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class DatePicker extends Block
{
    private PlainText|Mrkdwn $text;
    private PlainText $placeholder;

    public function __construct(
        PlainText|Mrkdwn|string $text,
        private readonly ?string $initialDate,
        PlainText|string $placeholder,
        private readonly string $actionId
    ) {
        $this->text = is_string($text) ? new PlainText($text) : $text;
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }

    public function jsonSerialize(): array
    {
        return array(
            'type' => 'section',
            'text' => $this->text->jsonSerialize()['text'],
            'accessory' => [
                'type' => 'datepicker',
                'initial_date' => $this->initialDate,
                'placeholder' => $this->placeholder->jsonSerialize()['text'],
                'action_id' => $this->actionId,
            ]
        );
    }
}
