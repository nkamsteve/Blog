<?php

namespace TestBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use TestBlogBundle\Entity\user;

class FormsController extends Controller
{
    /**
     * @Route("/inscription")
     */
     public function formAction(Request $request)
     {
         // create a task and give it some dummy data for this example
         $user = new user();
         //$user->setTask('Inscription');
         //$user->setDueDate(new \DateTime('tomorrow'));

         $form = $this->createFormBuilder($user)
             ->add('nom', TextType::class)
             ->add('prenom', TextType::class)
             ->add('email', EmailType::class)
             ->add('password', PasswordType::class)
             ->add('confirmpassword', PasswordType::class, array("mapped" => false))
             ->add('save', SubmitType::class, array('label' => 'Inscription'))
             ->getForm();

             $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$user` variable has also been updated
        $user = $form->getData();
        $user->setRole("USER_ROLE");
        $user->setPassword($this->get("security.password_encoder")->encodePassword($user, $user->getPassword()));
        $em = $this->getDoctrine()->getManager();
         $em->persist($user);
         $em->flush();


        return $this->redirectToRoute('home');
}


return $this->render('TestBlogBundle:Form:inscription.html.twig', array(
   'form' => $form->createView(),
));
     }
}
