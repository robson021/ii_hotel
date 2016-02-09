<?php

namespace ProjektHotel\HotelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjektHotelHotelBundle:Default:index.html.twig', array('name' => $name));
    }
}
