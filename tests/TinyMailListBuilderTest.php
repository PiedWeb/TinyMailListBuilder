<?php

declare(strict_types=1);

namespace PiedWeb\TinyMailListBuilder\Test;

use PiedWeb\TinyMailListBuilder\TinyMailListBuilder;

class TinyMailListBuilderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testInit()
    {
        $manager = new TinyMailListBuilder(['piedweb'], '/tmp');

        $this->assertTrue($manager->add('contact@example.tld', 'piedweb') !== false);

        $this->assertTrue(strpos(file_get_contents('/tmp/piedweb.txt'), 'contact@example.tld') !== false);
    }
}
