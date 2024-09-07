<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use Taboritis\ElegantSlackMessages\Blocks\RichText\Strikethrough;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Strikethrough::class)]
class StrikethroughTest extends TestCase
{
    #[Test]
    public function it_(): void
    {
        $this->markTestIncomplete("TODO: " . __METHOD__);
    }
}
