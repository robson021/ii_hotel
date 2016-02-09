<?php

namespace ProjektHotel\HotelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/start")
 */
class StartController extends Controller{

    
    /**
    * @Route("/index",
     * name="hotel_glowna")
     * 
    *
    * @Template  
    */
    public function indexAction(){
        return array();
    }
    
    /**
    * @Route("/galeria",
     * name="hotel_galeria")
    *
    * @Template  
    */
    public function galeriaAction(){
         return array();
    }
    
    /**
    * @Route("/kontakt",
     * name="hotel_kontakt")
    *
    * @Template  
    */
    public function kontaktAction(Request $Request){
        
          $kontakt=$this->createFormBuilder()
                
                ->add('nick', 'text')
                ->add('email', 'text')
              ->add('wiadomosc', 'textarea')
              ->add('potwierdz','submit')
                ->getForm();
        
        
        $kontakt->handleRequest($Request);
        
        if($kontakt->isValid()){
           // $fromData=$kontakt->getData();
        
            
           $message = \Swift_Message::newInstance()
                   ->setSubject('wiadomosc do hotelu')
                   ->setFrom(array($kontakt->get('email')->getData() => $kontakt->get('nick')->getName()))
                   ->setTo(array('nowak021@gmail.com'=> 'Hotel Sielanka'))
                   ->setBody(array($kontakt->get('wiadomosc')->getData()));
                  
                   
                  
                     $this->get('mailer')-> send($message);
            
            
        }
            
        
                
            
      return array(
           'kontakt'=> $kontakt->createView(),
           'fromData'=>  isset($fromData) ? $fromData : NULL,
       );
    }
    
        /**
    * @Route("/promocje",
     * name="hotel_promocje")
    *
    * @Template  
    */
    public function promocjeAction(){
         return array();
    }
        /**
    * @Route("/basen",
     * name="hotel_basen")
    *
    * @Template  
    */
    public function basenAction(){
         return array();
    }
     /**
    * @Route("/cennik",
     * name="hotel_cennik")
    *
    * @Template  
    */
    public function cennikAction(){
         return array();
    }
    
      /**
    * @Route("/opinie",
     * name="hotel_opinie")
    *
    * @Template  
    */
    public function opinieAction(){
         return array();
    }
    
    /**
    * @Route("/rejestracja",
    * name="hotel_rejestracja")
    *
    * @Template  
    */
    public function rejestracjaAction(Request $request){
        
//      $user = new User();      
         
        
      $form=$this->createFormBuilder()
                ->add('name', 'text' ,array(
              'label' =>'Imie i Nazwisko',))
                ->add('nick', 'text')
                ->add('email', 'text',array('label'=>'Email', 'constraints' => array(new Assert\Email())
                    ))
              ->add('password','password',array(
                     'label'=>'Haslo',))
                ->add('rules', 'checkbox',array(
              'label' =>'Potwierdzam ze zapoznałem się z regulaminem i chciałbym zapisać się do newsletera',))
              ->add('potwierdz','submit')
                ->getForm();
      
      
      
//         //if($Request->isMethod('POST')) {
//          
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($user);
//            $em->flush(); 
//   
//         //}
        
        return array(
            'form'=> $form->createView()
        );
    }
    
    /**
    * @Route("/zaloguj",
     * name="hotel_zaloguj")
    *
    * @Template  
    */
    public function zalogujAction(){
       
        $login=$this->createFormBuilder()
                 ->add('login','text',array(
                     'label'=>'Podaj swoj adres email lub nick', ))
                 ->add('password','password',array(
                     'label'=>'Haslo', ))
                 ->add('potwierdz','submit')
                 ->getForm();
         
         return array( 'login'=>$login->createView());
                 
    }
    
}
