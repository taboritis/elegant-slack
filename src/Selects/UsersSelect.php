<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

class UsersSelect extends Select implements HasInitialValue
{
    public function jsonSerialize(): array
    {
        return [
            'type' => 'users_select',
            'placeholder' => $this->placeholder->jsonSerialize(),
            'action_id' => $this->actionId
        ];
    }

    public function getInitialValueKey(): string
    {
        return 'initial_user';
    }
}
