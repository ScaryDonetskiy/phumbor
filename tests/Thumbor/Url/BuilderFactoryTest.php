<?php

namespace Thumbor\Url;

use PHPUnit_Framework_TestCase as TestCase;

class BuilderFactoryTest extends TestCase
{
    public function testUrl()
    {
        $server = 'http://thumbor.example.com';
        $secret = 'butts';
        $original = 'http://example.com/llamas.jpg';

        $builder = BuilderFactory::construct($server, $secret)
            ->url($original);

        $expected = Builder::construct($server, $secret, $original);

        $this->assertEquals($expected, $builder);
    }

    public function testBaseUrl()
    {
        $server = 'http://thumbor.example.com';
        $secret = 'butts';
        $baseUrl = 'http://example.com';
        $original = 'llamas.jpg';

        $builder = BuilderFactory::construct($server, $secret)->baseUrl($baseUrl)->url($original);
        $expected = Builder::construct($server, $secret, "$baseUrl/$original");

        $this->assertEquals($expected, $builder);
    }
}
