<?php

namespace App\Controller;

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
    #[Route('/plats', name: 'app_plat')]
    public function test(): Response
    {
        return $this->render('plat/index.html.twig', [
            'controller_name' => 'PlatController',
        ]);
    }
    #[Route('/plats/{categorie_id}', name: 'app_plats_par_categorie')]
    public function platsParCategorie($categorie_id): Response
    {
        
        return $this->render('acceuil/index.html.twig', [
            'categorie_id' => $categorie_id,
        ]);
    }
    #[Route('/categorie', name: 'app_categorie')]
    public function cate(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
}

