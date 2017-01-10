<?php
/**
 * Created by PhpStorm.
 * User: darek
 * Date: 09.01.17
 * Time: 12:37
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * Matches /blog exactly
     *
     * @Route("/blog/{page}", name="blog_list", requirements={"page": "\d+"})
     */
    public function listAction(){
        //
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */

    public function showAction($slug){
        //
    }

    /**
     * Możliwy jest bardzo skomplikowany routing z wieloma zastrzeżeniami:
     *
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}.{_format}",
     *     defaults={"_format": "html"},
     *     requirements={
     *     "_locale": "en|fr",
     *     "_format": "html|rss",
     *     "year": "\d+"
     *     }
     * )
     */

}