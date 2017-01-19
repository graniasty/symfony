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
        $products = $this->getProducts();
        return $this->render('product/list.html.twig', array(
            'zmienna' => "oskar",
            'products' => $products
        ));
    }

    /**
     * @Route("/{id}/add-to-cart")
     */
    public function addToCartAction($id)
    {
        if(!$product = $this->getProduct($id)){
            throw $this->createNotFoundException("Produkt nie znaleziony");
        }

        $session = $this->get('session');

        $basket = $session->get('basket', array());

        if(!array_key_exists($id, $basket)){
            $basket[$id] = [
                'id' => $id,
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        } else {
            $basket[$id]['quantity']++;
        }

        $session->set('basket', $basket);

        $this->addFlash('success', 'Produkt został pomyślnie dodany');

        return $this->redirectToRoute('app_product_basket');
    }

    /**
     * @Route("/basket")
     */
    public function basketAction()
    {
        $session = $this->get('session');
        //$products = array();
        $products = $session->get('basket', array());

        return $this->render('product/basket.html.twig', array(
            'zmienna' => "oskar",
            'products' => $products
        ));
    }

    /**
     * @Route("/{id}/remove-from-cart")
     */
    public function remogeFromCartAction($id)
    {
        $session = $this->get('session');

        $basket = $session->get('basket');

        unset($basket[$id]);

        $session->set('basket',$basket);

        $this->addFlash('success', 'Produkt został usunięty z koszyka');

        return $this->render('product/basket.html.twig' , array(
            'products' => $basket
        ));
    }

    /**
     * @Route("/cleanBasket")
     */
    public function cleanBasketAction()
    {

        $session = $this->get('session');

        //var_dump($session);

        $session->set('basket', array());

        $products = array();

        $this->addFlash('success', 'Koszyk został wyczyszczony');

        return $this->render('product/basket.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @return array
     */
    private function getProducts(){

        $file = file('products.txt');

        $products = array();

        foreach ($file as $p)
        {
            $e = explode(':' , trim($p));
            $products[$e[0]] = array(
                'id' => $e[0],
                'name' => $e[1],
                'price' => $e[2],
                'description' => $e[3],
                );
        }

        return $products;
    }

    /**
     * Pobiera produkt o zadanym id
     *
     * @param $id
     * @return mixed|null
     */
    private function getProduct($id)
    {
        $products = $this->getProducts();

        if(array_key_exists($id, $products)){
            return $products[$id];
        }
        return null;
    }

}
