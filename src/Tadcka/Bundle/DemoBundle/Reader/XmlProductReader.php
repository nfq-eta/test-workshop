<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Reader;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 12/20/15 11:38 AM
 */
class XmlProductReader 
{
    /**
     * @var \XMLReader
     */
    private $xml;

    /**
     * Constructor.
     */
    public function __construct($xmlPath)
    {
        $this->xml = new \XMLReader();
        $this->xml->open($xmlPath);
    }

    /**
     * @return array
     */
    public function read()
    {
        $products = [];

        while($this->xml->read()){
            if ($this->isProductNode()) {
                $node = $this->xml->expand();
                $products[] = $this->createProduct($node);
            }
        }

        return $products;
    }

    /**
     * @param \DOMNode $node
     *
     * @return array
     */
    private function createProduct(\DOMNode $node)
    {
        $product = [];
        $children = $node->childNodes;

        foreach ($children as $child) {
            if ($value = trim($child->nodeValue)) {
                $product[$child->nodeName] = $value;
            }
        }

        return $product;
    }

    /**
     * @return bool
     */
    private function isProductNode()
    {
        return (\XMLReader::ELEMENT === $this->xml->nodeType) && ('product' === $this->xml->name);
    }
}
 