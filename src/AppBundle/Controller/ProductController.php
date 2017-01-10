<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Product:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/add-to-cart")
     */
    public function addToCartAction($id)
    {
        return $this->render('AppBundle:Product:add_to_cart.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/basket")
     */
    public function basketAction()
    {
        return $this->render('AppBundle:Product:basket.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/remove-from-cart")
     */
    public function remogeFromCartAction($id)
    {
        return $this->render('AppBundle:Product:remove_from_cart.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/cleanBasket")
     */
    public function cleanBasketAction()
    {
        return $this->render('AppBundle:Product:clean_basket.html.twig', array(
            // ...
        ));
    }

}
