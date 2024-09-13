<?php

declare(strict_types=1);

namespace Tests\Blocks\Actions;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Taboritis\ElegantSlack\Blocks\Actions\Checkboxes;
use Taboritis\ElegantSlack\Blocks\Block;
use Taboritis\ElegantSlack\Blocks\Section\MrkdwnSection;
use Taboritis\ElegantSlack\Support\CheckboxOption;
use Taboritis\ElegantSlack\Support\CheckboxWithAction;

#[CoversClass(Checkboxes::class)]
class CheckboxesTest extends TestCase
{
    #[Test]
    public function it_extends_a_block(): void
    {
        $ref = new \ReflectionClass(Checkboxes::class);

        $this->assertTrue($ref->isSubclassOf(Block::class));
    }

    #[Test]
    public function it_allows_add_an_option(): void
    {
        $action = new CheckboxWithAction('actionId-0');
        $action->addOption(new CheckboxOption(
            text: 'this is plain_text text',
            description: 'this is plain_text text',
            value: 'value-0'
        ));
        $action->addOption(new CheckboxOption(
            text: new MrkdwnSection('this is mrkdwn text'),
            description: 'this is not *mrkdwn* text',
            value: 'value-1'
        ));
        $checkboxes = new Checkboxes($action);

        $expected = [
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'checkboxes',
                    'options' => [
                        [
                            'text' => [
                                'type' => 'plain_text',
                                'text' => 'this is plain_text text',
                                'emoji' => true,
                            ],
                            'description' => [
                                'type' => 'plain_text',
                                'text' => 'this is plain_text text',
                                'emoji' => true,
                            ],
                            'value' => 'value-0',
                        ],
                        [
                            'text' => [
                                'type' => 'mrkdwn',
                                'text' => 'this is mrkdwn text',
                            ],
                            'description' => [
                                'type' => 'plain_text',
                                'text' => 'this is not *mrkdwn* text',
                                'emoji' => true,
                            ],
                            'value' => 'value-1',
                        ],
                    ],
                    'action_id' => 'actionId-0',
                ],
            ],
        ];

        $this->assertSame($expected, $checkboxes->jsonSerialize());
    }
}
