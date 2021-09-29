<?php 

namespace App\Controller;

use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController{

    /**
     *@Route("/main/home",name="app_home")
     */
    public function home():Response{       
        $menu = [
            //     0       1
                ["Home","app_home"],
                ["Contact","app_contact"],
                ["About Us",""],
                ["Blog",""],
                ["Login",""],
                ["Register",""]
            ];
        return $this->render("main/index.html.twig",
                        [
                            "titre"=>"My Bucket List", 
                            "menu"=>$menu                      
                        ]
                    );
    }


    /**
     *@Route("/contact",name="app_contact")
     */
    public function contact():Response{       
     
        $menu = [
        //     0       1
            ["Home","app_home"],
            ["Contact","app_contact"],
            ["About Us",""],
            ["Blog",""],
            ["Login",""],
            ["Register",""]
        ];

        return $this->render("contact/index.html.twig",
                        [
                            "titre"=>"My Bucket List", 
                            "menu"=>$menu                   
                        ]
                    );
    }    

}