<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Tadcka\Bundle\DemoBundle\Entity\Product;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 12/20/15 1:01 PM
 */
class ProductRepository extends EntityRepository
{
    /**
     * @param string $name
     *
     * @return Product[]
     */
    public function searchByName($name)
    {
        $qb = $this->createQueryBuilder('p');

        $qb
            ->where($qb->expr()->like('p.name', ':name'))
            ->setParameter('name', '%' . $name .'%');


        return $qb->getQuery()->getResult();
    }
}
