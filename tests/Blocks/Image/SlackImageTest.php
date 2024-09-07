<?php

declare(strict_types=1);

namespace Tests\Blocks\Image;

use Taboritis\ElegantSlackMessages\Blocks\Image\SlackImage;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(SlackImage::class)]
class SlackImageTest extends TestCase
{
    #[Test]
    public function it_(): void
    {
        $this->markTestIncomplete("TODO: " . __METHOD__);
    }
}
