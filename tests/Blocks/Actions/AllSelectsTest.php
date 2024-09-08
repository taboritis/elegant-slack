<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\AllSelects;
use Taboritis\ElegantSlack\Blocks\Block;

#[CoversClass(AllSelects::class)]
class AllSelectsTest extends TestCase
{
    #[Test]
    public function it_extends_block(): void
    {
        $this->expectExceptionMessage('Not implemented yet');
        $this->assertInstanceOf(Block::class, new AllSelects());
    }

    #[Test]
    public function it_(): void
    {
        $this->markTestIncomplete("TODO: " . __METHOD__);
    }
}
