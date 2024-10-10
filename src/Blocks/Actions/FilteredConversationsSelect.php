<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\PlainText;

class FilteredConversationsSelect extends Block
{
    private PlainText $placeholder;

    /**
     * @param array<int, string> $include
     */
    public function __construct(
        PlainText|string $plainText,
        private readonly string $actionId,
        private readonly array $include = ["private"]
    ) {
        $this->placeholder = is_string($plainText) ? new PlainText($plainText) : $plainText;
    }

    public function jsonSerialize(): array
    {
        return [
            "type" => "actions",
            "elements" => [
                [
                    "type" => "conversations_select",
                    "placeholder" => $this->placeholder->jsonSerialize(),
                    "filter" => [
                        "include" => $this->include
                    ],
                    "action_id" => $this->actionId
                ]
            ]
        ];
    }
}
