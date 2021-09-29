<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit", name="produit_")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            "titre"=>"Produit",
            "menu"=>[]
        ]);
    }

    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouter(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            "titre"=>"Produit",
            "menu"=>[]
        ]);
    }
    /**
     * @Route("/modifier", name="modifier")
     */
    public function modifier(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            "titre"=>"Produit",
            "menu"=>[]
        ]);
    }        
}
