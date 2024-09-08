<?php

declare(strict_types=1);

namespace Tests\Blocks\Section;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\PlainText;
use Taboritis\ElegantSlack\Blocks\Section\TextFields;

#[CoversClass(TextFields::class)]
class TextFieldsTest extends TestCase
{
    private TextFields $textFields;

    protected function setUp(): void
    {
        parent::setUp();
        $this->textFields = new TextFields();
    }
    #[Test]
    public function it_extends_block(): void
    {
        $this->assertInstanceOf(Block::class, $this->textFields);
    }

    #[Test]
    public function it_allows_to_add_plain_text(): void
    {
        $this->textFields->addPlainText(new PlainText('Hello, world!'));

        $this->assertIsArray($this->textFields->jsonSerialize());
    }

    #[Test]
    public function it_allows_to_add_string(): void
    {
        $this->textFields->addPlainText('Hello, world!');

        $this->assertIsArray($this->textFields->jsonSerialize());
    }

    #[Test]
    public function it_converts_plain_text(): void
    {
        $expected = [
            'type' => 'section',
            'fields' => [
                [
                    'type' => 'plain_text',
                    'text' => '*this is plain_text text*',
                    'emoji' => true
                ]
            ]
        ];

        $this->textFields->addPlainText(new PlainText('*this is plain_text text*'));

        $this->assertEquals($expected, $this->textFields->jsonSerialize());
    }
}
