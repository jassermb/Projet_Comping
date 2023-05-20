<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{ 
    #[Route('/form', name: 'app_boutique')]
    public function monAction(Request $request)
    {
        $monFormulaire = $this->createForm(MonFormulaireType::class);
        $vueFormulaire = $monFormulaire->createView();

        return $this->render('pages\form.html.twig', [ 
            'formulaire' => $vueFormulaire,   ]);
        // ...
        $monFormulaire->handleRequest($request);
        if ($monFormulaire->isSubmitted() && $monFormulaire->isValid()) {
            // Traitement de la soumission du formulaire

    } } 
    #[Route('/boutique', name: 'app_boutique')]
    public function boutique(): Response
    {
        return $this->render('pages/boutique.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/Acceuil', name: 'app_Acceuil')]
    public function Acceuil(): Response
    {
        return $this->render('pages\Acceuil.html.twig',[
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/Contact', name: 'app_Contact')]
    public function Contact(): Response
    {
        return $this->render('pages/Contact.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/Inscri', name: 'app_Inscri')]
    public function inscription(): Response
    {
        return $this->render('pages\Inscri.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/Camping', name: 'app_Camping')]
    public function Camping(): Response
    {
        return $this->render('pages/Camping.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/paiement', name: 'app_paiement')]
    public function paiement(): Response
    {
        return $this->render('pages\paiement.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    

}
