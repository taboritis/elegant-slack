<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Selects;

use Taboritis\ElegantSlack\Support\PlainText;

abstract class Select implements SelectInterface
{
    protected PlainText $placeholder;

    public function __construct(PlainText|string $placeholder, protected readonly string $actionId)
    {
        $this->placeholder = is_string($placeholder) ? new PlainText($placeholder) : $placeholder;
    }
}
