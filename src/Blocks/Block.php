<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages\Blocks;

abstract class Block implements \JsonSerializable
{
    /**
     * @return array<string, mixed>
     */
    abstract public function jsonSerialize(): array;
}
