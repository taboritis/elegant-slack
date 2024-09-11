<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlack\Blocks\Context;

use JsonSerializable;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Support\Image;
use Taboritis\ElegantSlack\Support\Mrkdwn;
use Taboritis\ElegantSlack\Support\PlainText;

class Context extends Block
{
    /**
     * @var array<JsonSerializable>
     */
    private array $elements = [];

    public function addText(PlainText|string $text): static
    {
        $this->elements[] = is_string($text) ? new PlainText($text) : $text;

        return $this;
    }

    public function addMrkdwn(Mrkdwn|string $text): static
    {
        $this->elements[] = is_string($text) ? new Mrkdwn($text) : $text;

        return $this;
    }

    public function addImage(Image $image): static
    {
        $this->elements[] = $image;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'context',
            'elements' => array_map(fn($element) => $element->jsonSerialize(), $this->elements),
        ];
    }
}
