<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

interface SelectInterface
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array;
}
