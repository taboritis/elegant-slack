<?php

declare(strict_types=1);

namespace Tests\Blocks;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;

#[CoversClass(Block::class)]
class BlockTest extends TestCase
{
    #[Test]
    public function it_is_abstract(): void
    {
        $this->assertTrue((new \ReflectionClass(Block::class))->isAbstract());
    }

    #[Test]
    public function it_implements_json_serializable(): void
    {
        $reflection = new \ReflectionClass(Block::class);

        $this->assertTrue($reflection->implementsInterface(\JsonSerializable::class));
    }
}
