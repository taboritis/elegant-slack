<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Selects\HasInitialValue;

class SelectWithInitialOptions extends Block
{
    /**
     * @var HasInitialValue[]
     */
    private array $elements = [];


    /**
     * @var array<int, string>
     */
    private array $initialValues = [];

    public function addSelect(HasInitialValue $select, string $initialValue): self
    {
        $this->elements[] = $select;
        $this->initialValues[] = $initialValue;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $output = [];

        foreach ($this->elements as $key => $select) {
            $selectWithInitialValue = $select->jsonSerialize() + [
                    $select->getInitialValueKey() => $this->initialValues[$key]
                ];
            $output[] = $selectWithInitialValue;
        }

        return [
            'type' => 'actions',
            'elements' => $output
        ];
    }
}
