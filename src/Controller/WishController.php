<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{ 
    /**
     * @Route("/wish/detail/{id}", name="app_wish_detail")
     */
    public function detail($id=0): Response
    {
        $titre= "Bucket List - Wish detail";    
        $tab = compact("titre");     
        return $this->render('wish/detail.html.twig', $tab);
    }


    /**
     * @Route("/wish/list", name="app_wish_list")
     */
    public function list(): Response
    {
        $titre= "Bucket List - Wish list";    
        $tab = compact("titre");         
        return $this->render('wish/list.html.twig',$tab);
    }    
}
