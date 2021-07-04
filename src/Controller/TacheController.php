<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TacheController extends AbstractController
{
    #[Route('/taches', name: 'tache')]
    public function index(): Response
    {
        return $this->render('tache/index.html.twig', [
            'controller_name' => 'TacheController',
        ]);
    }

    
    /**
     * @Routes("/taches/create",name="app_taches_create")
     */
    public function create(): Response{

        $tache = new Tache();
        $formulaire = $this->createForm(Tachetype::class,$tache)
        
        $formulaire->$form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            
            $entityManager = $this-> $getDoctrine->getManager();
            $entityManager->persist($tache);
            $entityManager->flush();

            $this->return $this->redirectToRoute('taches');
        }
        return $this->render ('tache/index.html.twig',{
            'formulaire' =>$formulaire->createView()
        });
        

    }
}

