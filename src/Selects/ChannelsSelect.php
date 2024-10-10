<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

class ChannelsSelect extends Select implements HasInitialValue
{
    public function jsonSerialize(): array
    {
        return [
            'type' => 'channels_select',
            'placeholder' => $this->placeholder->jsonSerialize(),
            'action_id' => $this->actionId
        ];
    }

    public function getInitialValueKey(): string
    {
        return 'initial_channel';
    }
}
