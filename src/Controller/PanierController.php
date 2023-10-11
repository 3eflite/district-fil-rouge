<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(CartService $cartService): Response
    {
        $response = $cartService->listProducts();
        $jsonData = json_decode($response->getContent(), true);
        $cartData = $jsonData['cart'];


        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'cart' => $cartData
        ]);
    }

    #[Route('/panier/ajout/{id}', name: 'ajoutPanier')]
    public function ajoutPanier($id, CartService $cartService): JsonResponse
    {
        $response = $cartService->addProduct($id);

        return $response;
    }

    #[Route('/panier/suppression/{id}', name: 'suppressionPanier')]
    public function suppressionPanier($id, CartService $cartService): JsonResponse
    {
        $response = $cartService->deleteProduct($id);

        return $response;
    }
}
