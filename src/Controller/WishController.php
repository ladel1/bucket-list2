<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{ 
    /**
     * @Route("/wish/detail/{id}", name="app_wish_detail")
     */
    public function detail(WishRepository $repo,$id=0): Response
    {
        $wish = $repo->find($id);
        $titre= "Bucket List - Wish detail";    
        $tab = compact("titre","wish");     
        return $this->render('wish/detail.html.twig', $tab);
    }

    /**
     * @Route("/wish/delete/{id}", name="app_wish_delete")
     */
    public function delete(WishRepository $repo,EntityManagerInterface $em,$id): Response
    {
        $wish = $repo->find($id);
        $em->remove($wish);
        $em->flush();
        return $this->redirectToRoute("app_wish_list");
    }   


        /**
     * @Route("/wish/update/{id}", name="app_wish_update")
     */
    public function update(WishRepository $repo,EntityManagerInterface $em,$id): Response
    {
        $wish = $repo->find($id);
        $wish->setTitle("321321");
        $em->flush();
        return $this->redirectToRoute("app_wish_list");
    }   

    /**
     * @Route("/wish/add-form", name="app_wish_add_form")
     */
    public function addForm(EntityManagerInterface $em,Request $request): Response
    {
        // instanciation de la classe Wish 
        $wish = new Wish();
        // la creation du formulaire
        $form = $this->createForm(WishType::class,$wish);
        // remplire l'objet wish 
        $form->handleRequest($request);
        // verifier si on a soumis le form et si les donnes valide
        if($form->isSubmitted() && $form->isValid()){
            // génerer sql insert into et ajouter dans queue  
            $em->persist($wish);
            // appliquer insert into dans la bdd
            $em->flush();
            // redirect vers la liste wish
            return $this->redirectToRoute("app_wish_list");
        }

        $titre= "Bucket List - Wish list";    
        $tab = compact("titre");
        $tab["formWish"]=$form->createView();                 
        return $this->render('wish/add-form.html.twig',$tab);
    }  


    /**
     * @Route("/wish/add", name="app_wish_add")
     */
    public function add(EntityManagerInterface $em,Request $request): Response
    {
        $error ="";
        if($request->request->get("add")!=null){        
            if(trim($request->request->get("title"))!=""){
                $wish = new Wish();
                $wish->setTitle($request->request->get("title"))
                ->setDescription($request->request->get("description"))
                ->setAuthor($request->request->get("author"));
                $em->persist($wish);
                $em->flush();
                return $this->redirectToRoute("app_wish_list");
            }else{
                $error="Le titre ne doit pas etre vide!";
            }    
        }
        $titre= "Bucket List - Wish list";    
        $tab = compact("titre","error");                 
        return $this->render('wish/add.html.twig',$tab);
    }   

    /**
     * @Route("/wish/list", name="app_wish_list")
     */
    public function list(WishRepository $repo,EntityManagerInterface $em): Response
    {
        $wishes = $repo->findBy(
            ["isPublished"=>true],
            ["dateCreated"=>"Desc"]        
        );
        $titre= "Bucket List - Wish list";    
        $tab = compact("titre","wishes");                 
        return $this->render('wish/list.html.twig',$tab);
    }    
}
