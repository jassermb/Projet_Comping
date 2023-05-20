<?php

namespace App\Controller;

use App\Entity\Inscri;
use App\Form\InscriType;
use App\Repository\InscriRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/inscri')]
class InscriController extends AbstractController
{
    #[Route('/', name: 'app_inscri_index', methods: ['GET'])]
    public function index(InscriRepository $inscriRepository): Response
    {
        return $this->render('inscri/index.html.twig', [
            'inscris' => $inscriRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_inscri_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InscriRepository $inscriRepository): Response
    {
        $inscri = new Inscri();
        $form = $this->createForm(InscriType::class, $inscri);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscriRepository->save($inscri, true);

            return $this->redirectToRoute('app_inscri_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('inscri/new.html.twig', [
            'inscri' => $inscri,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_inscri_show', methods: ['GET'])]
    public function show(Inscri $inscri): Response
    {
        return $this->render('inscri/show.html.twig', [
            'inscri' => $inscri,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_inscri_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Inscri $inscri, InscriRepository $inscriRepository): Response
    {
        $form = $this->createForm(InscriType::class, $inscri);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscriRepository->save($inscri, true);

            return $this->redirectToRoute('app_inscri_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('inscri/edit.html.twig', [
            'inscri' => $inscri,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_inscri_delete', methods: ['POST'])]
    public function delete(Request $request, Inscri $inscri, InscriRepository $inscriRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inscri->getId(), $request->request->get('_token'))) {
            $inscriRepository->remove($inscri, true);
        }

        return $this->redirectToRoute('app_inscri_index', [], Response::HTTP_SEE_OTHER);
    }
}
