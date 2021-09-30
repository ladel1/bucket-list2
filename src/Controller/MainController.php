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
        $titre= "Bucket List - Home";    
        $tab = compact("titre");
        return $this->render("main/index.html.twig",$tab);
    }  
    
    /**
     *@Route("/about-us",name="app_about_us")
     */
    public function aboutUs(Request $request):Response{   
        $titre= "Bucket List - About Us";    
        $tab = compact("titre");
        return $this->render("main/about-us.html.twig",$tab);
    }    

    /**
     *@Route("/legal-stuff",name="app_legal")
     */
    public function legal(Request $request):Response{   
        $titre= "Bucket List - Mentions Légales";    
        $tab = compact("titre");
        return $this->render("main/legal-stuff.html.twig",$tab);
    } 
}