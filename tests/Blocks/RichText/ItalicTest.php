<?php

declare(strict_types=1);

namespace Tests\Blocks\RichText;

use Taboritis\ElegantSlackMessages\Blocks\RichText\Italic;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Italic::class)]
class ItalicTest extends TestCase
{
    #[Test]
    public function it_(): void
    {
        $this->markTestIncomplete("TODO: " . __METHOD__);
    }
}
