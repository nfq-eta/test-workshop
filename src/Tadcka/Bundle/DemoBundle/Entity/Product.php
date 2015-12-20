<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Tadcka\Bundle\DemoBundle\Entity\Repository\ProductRepository")
 */
class Product 
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", unique=true, nullable=false)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * Constructor.
     *
     * @param string $sku
     */
    public function __construct($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $sku
     *
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
