<?php

declare(strict_types=1);

namespace Tests\Support;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Support\CheckboxOption;

#[CoversClass(CheckboxOption::class)]
class CheckboxOptionTest extends TestCase
{
    #[Test]
    public function it_implements_json_serializable(): void
    {
        $option = new CheckboxOption('text', 'description', 'value');
        $this->assertInstanceOf(\JsonSerializable::class, $option);
    }

    #[Test]
    public function it_can_be_converted_to_array(): void
    {
        $option = new CheckboxOption('text', 'description', 'value');

        $this->assertArrayHasKey('text', $option->jsonSerialize());
        $this->assertArrayHasKey('description', $option->jsonSerialize());
        $this->assertArrayHasKey('value', $option->jsonSerialize());
    }
}
