<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

class ConversationsSelect extends Select implements HasInitialValue
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'conversations_select',
            'placeholder' => $this->placeholder->jsonSerialize(),
            'action_id' => $this->actionId
        ];
    }

    public function getInitialValueKey(): string
    {
        return 'initial_conversation';
    }
}
