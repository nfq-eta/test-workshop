<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 12/20/15 1:52 PM
 */
class ProductControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = static::createClient();
    }

    public function testIndexAction()
    {
        $crawler = $this->client->request('GET', '/product');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Cool product!', $crawler->filter('h1')->text());
    }

    public function testOldIndexAction()
    {
        $crawler = $this->client->request('GET', '/products');

        $this->assertEquals(301, $this->client->getResponse()->getStatusCode());
        $this->assertGreaterThan(new \DateTime(), new \DateTime('2015-12-21 18:30:00'));
    }
}
 