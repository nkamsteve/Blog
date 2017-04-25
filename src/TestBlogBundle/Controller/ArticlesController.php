<?php

namespace TestBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticlesController extends Controller
{
  /**
   * @Route("/Articles/presentation")
   */
  public function ArticlesAction()
  {
      return $this->render('TestBlogBundle:Articles:presentation.html.twig', array(
          // ...
      ));
  }






}
