<?php

namespace TestBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use TestBlogBundle\Entity\Article;
use TestBlogBundle\Form\ArticleType;

class AdminController extends Controller
{
  /**
   * @Route("/admin/create_articles")
   */

    public function createdAction()
    {
      $user = $this->getUser();
      if(!($this->get('security.authorization_checker')->isGranted("ROLE_ADMIN"))){
        return $this->redirectToRoute("home");
      }

      $em = $this->getDoctrine()->getManager();
      $listeArticle = $em->getRepository("TestBlogBundle:Article")->findBy(array("user" => $user));

      return $this->render('TestBlogBundle:Admin:created.html.twig', array(
          "listeArticle" => $listeArticle
      ));
    }


    public function nouveauAction(Request $request){
      $user = $this->getUser();
      if(!($this->get('security.authorization_checker')->isGranted("ROLE_ADMIN"))){
        return $this->redirectToRoute("home");
      }
      $em = $this->getDoctrine()->getManager();

      $article = new Article();
      $article->setUser($user);
      $article->setPublished(true);

      //formulaire de creation d'article
      $form = $this->get("form.factory")->create(ArticleType::class, $article);
      $form->handleRequest($request);
      if($request->isMethod("post") && $form->isSubmitted() && $form->isValid()){
        $cover = $article->getCover();
        if($cover != NULL){
          $file = $cover->getImageFile();
          if($file != NULL){
              $cover->setUser($user);
              $cover->setImageSize(0);
              $cover->setType("image");
          }
        }
        $em->persist($article);
        $em->flush();
        return $this->redirectToRoute("create_articles");
      }
      return $this->render('TestBlogBundle:Admin:nouveau.html.twig', array(
          "form" => $form->createView()
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
