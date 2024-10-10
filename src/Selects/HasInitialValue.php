<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

interface HasInitialValue extends SelectInterface
{
    public function getInitialValueKey(): string;
}
