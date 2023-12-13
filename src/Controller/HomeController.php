<?php

namespace App\Controller;


use App\Entity\Document;
use App\Repository\DocumentRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(DocumentRepository $documentRepository): Response
    {
       // $document = $documentRepository->findRecentDocument();
        return $this->render(
            'home/index.html.twig', [
            'controller_name' => 'HomeController',
            'documents'=> $documentRepository->findAll(),
            ]
        );
    }
}
