<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Tests\Functional\Entity\Repository;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 12/20/15 12:56 PM
 *
 * @link http://symfony.com/doc/current/cookbook/testing/database.html
 * @link http://symfony.com/doc/current/cookbook/testing/doctrine.html
 */
class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByName()
    {
        $products = $this->em
            ->getRepository('TadckaDemoBundle:Product')
            ->searchByName('foo')
        ;

        $this->assertCount(1, $products);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
    }
}
 