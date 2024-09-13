<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Input;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class DispatchesCustomActions extends Block
{
    private PlainText $label;

    /**
     * @param array<string> $triggerActionsOn
     */
    public function __construct(
        PlainText|string $label,
        private readonly string $actionId,
        private readonly array $triggerActionsOn = ['on_character_entered']
    ) {
        $this->label = is_string($label) ? new PlainText($label) : $label;
    }

    public function jsonSerialize(): array
    {
        return [
            'dispatch_action' => true,
            'type' => 'input',
            'element' => [
                'type' => 'plain_text_input',
                'dispatch_action_config' => [
                    'trigger_actions_on' => $this->triggerActionsOn,
                ],
                'action_id' => $this->actionId,
            ],
            'label' => $this->label->jsonSerialize()
        ];
    }
}
