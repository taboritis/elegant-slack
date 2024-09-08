<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlackMessages\Blocks\Block;
use Taboritis\ElegantSlackMessages\Blocks\Section\Checkboxes;

#[CoversClass(Checkboxes::class)]
class CheckboxesTest extends TestCase
{
    private Checkboxes $checkboxes;

    protected function setUp(): void
    {
        parent::setUp();
        $this->checkboxes = new Checkboxes();
    }
    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, $this->checkboxes);
    }
    
    #[Test]
    public function it_allows_to_add_an_option(): void
    {
        
    }
}
