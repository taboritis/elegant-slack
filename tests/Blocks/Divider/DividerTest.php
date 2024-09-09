<?php

declare(strict_types=1);

namespace Tests\Blocks\Divider;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Divider\Divider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Divider::class)]
class DividerTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $reflection = new \ReflectionClass(Divider::class);

        $this->assertTrue($reflection->isSubclassOf(Block::class));
    }
}
