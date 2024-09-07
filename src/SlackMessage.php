<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages;

use JsonSerializable;
use Stringable;
use Taboritis\ElegantSlackMessages\Blocks\Block;

class SlackMessage implements Stringable
{
    /**
     * @var array<JsonSerializable>
     */
    private array $blocks = [];

    public function addBlock(Block $block): static
    {
        $this->blocks[] = $block;

        return $this;
    }

    public function __toString(): string
    {
        $blocks = [];

        foreach ($this->blocks as $block) {
            $blocks[] = $block->jsonSerialize();
        }

        $json = json_encode(['blocks' => $blocks]);

        if ($json === false) {
            throw new \RuntimeException('Failed to encode JSON: ' . json_last_error_msg());
        }

        return $json;
    }
}
