<?php 

namespace App\Controller;

use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController{

    /**
     *@Route("/home",name="app_home")
     */
    public function home(Request $request):Response{   
        $titre= "My Bucket List";    
        $menu = [
            //     0       1
                ["Home","app_home"],
                ["Contact","app_contact"],
                ["About Us",""],
                ["Blog",""],
                ["Login",""],
                ["Register",""]
            ];
        $name ="Adel";
        $tab = compact("titre",'menu',"name");
        $tab["key"]="value";
        return $this->render("main/index.html.twig",$tab);
    }   

}