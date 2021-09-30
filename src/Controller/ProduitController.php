<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{

    /**
     * @Route("/produit/detail/{id}", name="liste_produit")
     */
    public function detail(ProduitRepository $repo,$id=0): Response
    {
        dd($repo->find($id));
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    /**
     * @Route("/produit", name="produit")
     */
    public function index(EntityManagerInterface $em): Response
    {

        // ajouter une donnee produit 
        $produit = new Produit();
        $produit->setName("Samsung S21");
        $produit->setDescription("azerty");
        $produit->setPrix(800);
        $produit2 = new Produit();
        $produit2->setName("Samsung S21");
        $produit2->setDescription("azerty");
        $produit2->setPrix(800);        
        // Entity Manager
        //$em = $this->getDoctrine()->getManager();

        // persister
        
        
        
        $em->persist($produit);
        $em->persist($produit2);

        $em->flush();        


        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
}
