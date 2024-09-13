<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Actions;

use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Datepicker;

class DatePickers extends Block
{
    /**
     * @var array<int, Datepicker>
     */
    private array $datepickers = [];

    public function __construct(Datepicker $datepicker)
    {
        $this->datepickers[] = $datepicker;
    }

    public function jsonSerialize(): array
    {
        return [
            "type" => "actions",
            "elements" => array_map(fn(Datepicker $datepicker) => $datepicker->jsonSerialize(), $this->datepickers)
        ];
    }

    public function addDatepicker(Datepicker $datepicker): static
    {
        $this->datepickers[] = $datepicker;
        return $this;
    }
}
