<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function Main(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/categorie', name: 'app_categorie')]
    public function index(CategorieRepository $categorieRepository): Response
    {

        $categories = $categorieRepository->findAll();

        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/categorie/{id}', name: 'showCategory')]
    public function showCategory(CategorieRepository $categorieRepository, Categorie $categorie, PlatRepository $platRepository): Response
    {
        $dishes = $platRepository->findByCategorieId($categorie->getId());


        return $this->render('categorie/show.html.twig', [
            'category' => $categorie,
            'dishes' => $dishes
        ]);
    }
}

