<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\CheckboxesSection;
use Taboritis\ElegantSlack\Support\CheckboxOption;

#[CoversClass(CheckboxesSection::class)]
class CheckboxesSectionTest extends TestCase
{
    private CheckboxesSection $checkboxes;

    protected function setUp(): void
    {
        parent::setUp();
        $this->checkboxes = new CheckboxesSection('Plain text', 'action-1');
    }

    #[Test]
    public function it_extends_a_block(): void
    {
        $this->assertInstanceOf(Block::class, $this->checkboxes);
    }

    #[Test]
    public function it_allows_to_add_an_option(): void
    {
        $result = $this->checkboxes->jsonSerialize();
        $this->assertCount(0, $result['accessory']['options']);

        $this->checkboxes->addOption(new CheckboxOption('option', 'description', 'value'));

        $result = $this->checkboxes->jsonSerialize();

        $this->assertCount(1, $result['accessory']['options']);
    }
}
