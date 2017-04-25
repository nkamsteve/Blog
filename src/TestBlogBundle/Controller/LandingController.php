<?php

namespace TestBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LandingController extends Controller
{
    /**
     * @Route("/home")
     */
    public function indexAction()
    {
        return $this->render('TestBlogBundle:Landing:landing.html.twig', array(
            // ...
        ));
    }


    /**
     * @Route("/propos")
     */
    public function proposAction()
    {
        return $this->render('TestBlogBundle:Landing:propos.html.twig', array(
            // ...
        ));
    }

}
