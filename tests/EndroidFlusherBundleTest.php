<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\FlusherBundle\Tests;

use Endroid\BundleTest\BundleTestCase;
use Endroid\Flusher\Flusher;

class EndroidFlusherBundleTest extends BundleTestCase
{
    public function testServiceExists(): void
    {
        $client = static::createClient();
        $flusher = $client->getKernel()->getContainer()->get(Flusher::class);

        $this->assertInstanceOf(Flusher::class, $flusher);
    }
}
