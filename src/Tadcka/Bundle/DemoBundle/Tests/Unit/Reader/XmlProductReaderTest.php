<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Tests\Unit\Reader;

use PHPUnit_Framework_TestCase as TestCase;
use Tadcka\Bundle\DemoBundle\Reader\XmlProductReader;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 12/20/15 11:36 AM
 */
class XmlProductReaderTest extends TestCase
{
    public function testRead_v1()
    {
        $reader = new XmlProductReader(__DIR__ . '/../../MockFiles/product-v1.xml');

        $products = $reader->read();

        $this->assertCount(3, $products);

        $this->assertEquals(111111111, $products[0]['sku']);
        $this->assertEquals('Pirmas', $products[0]['name']);

        $this->assertEquals(222222222, $products[1]['sku']);
        $this->assertEquals('Antras', $products[1]['name']);

        $this->assertEquals(333333333, $products[2]['sku']);
        $this->assertEquals('Trečias', $products[2]['name']);
    }
}
 