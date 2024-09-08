<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Section;

use Taboritis\ElegantSlack\Blocks\Block;

class DatePickerSection extends Block
{
    private PlainTextSection|MrkdwnSection $text;
    private PlainTextSection $placeholder;

    public function __construct(
        PlainTextSection|MrkdwnSection|string $text,
        private readonly ?string $initialDate,
        PlainTextSection|string $placeholder,
        private readonly string $actionId
    ) {
        $this->text = is_string($text) ? new PlainTextSection($text) : $text;
        $this->placeholder = is_string($placeholder) ? new PlainTextSection($placeholder) : $placeholder;
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
