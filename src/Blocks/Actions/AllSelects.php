<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Selects\Select;

class AllSelects extends Block
{
    /**
     * @var array<int, Select>
     */
    private array $elements = [];

    public function addSelect(Select $select): static
    {
        $this->elements[] = $select;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'actions',
            'elements' => array_map(fn(Select $select) => $select->jsonSerialize(), $this->elements)
        ];
    }
}
