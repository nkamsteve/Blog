<?php

namespace TestBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
  /**
   * @Route("/admin/create_articles")
   */

    public function createdAction()
    {
      return $this->render('TestBlogBundle:Admin:created.html.twig', array(
          // ...
      ));
    }


    /**
     * @Route("/admin/show_articles")
     */

      public function showAction()
      {
        return $this->render('TestBlogBundle:Admin:show.html.twig', array(
            // ...
        ));
      }


      /**
       * @Route("/admin/manageUsers")
       */

        public function manageUsersAction()
        {
          return $this->render('TestBlogBundle:Admin:manageUsers.html.twig', array(
              // ...
          ));
        }

}
