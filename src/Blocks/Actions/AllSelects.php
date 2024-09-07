<?php

declare(strict_types=1);

namespace Taboritis\ElegantSlackMessages\Blocks\Actions;

use Taboritis\ElegantSlackMessages\Blocks\Block;
use Taboritis\ElegantSlackMessages\Exceptions\NotImplementedException;

class AllSelects extends Block
{
    public function __construct()
    {
        throw new NotImplementedException('Not implemented yet');
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => 'actions',
            'elements' => [
                [
                    'type' => 'conversations_select',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Select a conversation',
                        'emoji' => true
                    ],
                    'action_id' => 'actionId-0'
                ],
                [
                    'type' => 'channels_select',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Select a channel',
                        'emoji' => true
                    ],
                    'action_id' => 'actionId-1'
                ],
                [
                    'type' => 'users_select',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Select a user',
                        'emoji' => true
                    ],
                    'action_id' => 'actionId-2'
                ],
                [
                    'type' => 'static_select',
                    'placeholder' => [
                        'type' => 'plain_text',
                        'text' => 'Select an item',
                        'emoji' => true
                    ],
                    'options' => [
                        [
                            'text' => [
                                'type' => 'plain_text',
                                'text' => '*plain_text option 0*',
                                'emoji' => true
                            ],
                            'value' => 'value-0'
                        ],
                        [
                            'text' => [
                                'type' => 'plain_text',
                                'text' => '*plain_text option 1*',
                                'emoji' => true
                            ],
                            'value' => 'value-1'
                        ],
                        [
                            'text' => [
                                'type' => 'plain_text',
                                'text' => '*plain_text option 2*',
                                'emoji' => true
                            ],
                            'value' => 'value-2'
                        ]
                    ],
                    'action_id' => 'actionId-3'
                ]
            ]
        ];
    }
}
