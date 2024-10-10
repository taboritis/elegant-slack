<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\CheckboxWithAction;

class Checkboxes extends Block
{
    /**
     * @var array<CheckboxWithAction>
     */
    private array $actions = [];

    public function __construct(CheckboxWithAction $checkboxWithAction)
    {
        $this->actions[] = $checkboxWithAction;
    }

    public function jsonSerialize(): array
    {
        return [
            "type" => "actions",
            "elements" => array_map(function (CheckboxWithAction $checkboxWithAction): array {
                return $checkboxWithAction->jsonSerialize();
            }, $this->actions)
        ];
    }
}
