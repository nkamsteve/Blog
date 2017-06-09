<?php

namespace TestBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
  /**
   * @Route("/Articles/presentation")
   */
  public function ArticlesAction()
  {

      $user = $this->getUser();
      /*if(!($this->get('security.authorization_checker')->isGranted("ROLE_USER"))){
        return $this->redirectToRoute("home");
      }*/

      $em = $this->getDoctrine()->getManager();
      $listeArticle = $em->getRepository("TestBlogBundle:Article")->findAll();
    return $this->render('TestBlogBundle:Articles:presentation.html.twig', array(
      "listeArticle" => $listeArticle
    ));
  }

  public function voirArticleAction($id){
    $user = $this->getUser();
    /*if(!($this->get('security.authorization_checker')->isGranted("ROLE_USER"))){
      return $this->redirectToRoute("home");
    }*/

    $em = $this->getDoctrine()->getManager();

    $article = $em->getRepository("TestBlogBundle:Article")->findOneBy(array("id" => $id));
    return $this->render('TestBlogBundle:Articles:voirArticle.html.twig', array(
        "article" => $article
    ));
  }






}
