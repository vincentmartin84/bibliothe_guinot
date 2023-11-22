<?php

namespace App\Controller;

use App\Entity\Available;
use App\Form\AvailableType;
use App\Repository\AvailableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/available')]
class AvailableController extends AbstractController
{
    #[Route('/', name: 'app_available_index', methods: ['GET'])]
    public function index(AvailableRepository $availableRepository): Response
    {
        return $this->render('available/index.html.twig', [
            'availables' => $availableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_available_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $available = new Available();
        $form = $this->createForm(AvailableType::class, $available);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($available);
            $entityManager->flush();

            return $this->redirectToRoute('app_available_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('available/new.html.twig', [
            'available' => $available,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_available_show', methods: ['GET'])]
    public function show(Available $available): Response
    {
        return $this->render('available/show.html.twig', [
            'available' => $available,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_available_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Available $available, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvailableType::class, $available);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_available_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('available/edit.html.twig', [
            'available' => $available,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_available_delete', methods: ['POST'])]
    public function delete(Request $request, Available $available, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$available->getId(), $request->request->get('_token'))) {
            $entityManager->remove($available);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_available_index', [], Response::HTTP_SEE_OTHER);
    }
}
