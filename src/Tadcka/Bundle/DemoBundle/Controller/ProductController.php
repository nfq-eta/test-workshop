<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 12/20/15 1:50 PM
 */
class ProductController 
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * Constructor.
     *
     * @param RouterInterface $router
     * @param EngineInterface $templating
     */
    public function __construct(RouterInterface $router, EngineInterface $templating)
    {
        $this->router = $router;
        $this->templating = $templating;
    }

    public function indexAction()
    {
        return $this->templating->renderResponse('TadckaDemoBundle:Product:index.html.twig');
    }

    public function oldIndexAction()
    {
        return new RedirectResponse($this->router->generate('tadcka_demo_product_old_index'), 301);
    }
}
 