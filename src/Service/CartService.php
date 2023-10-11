<?php

namespace App\Service;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartService extends AbstractController
{
    private $requestStack;
    private $platRepository;

    public function __construct(RequestStack $requestStack, PlatRepository $platRepository)
    {
        $this->requestStack = $requestStack;
        $this->platRepository = $platRepository;
    }

    public function addProduct($idDish): Response
    {
        $cart = $this->requestStack->getSession()->get('cart', []);

        $dish = $this->platRepository->find($idDish);

        if (!$dish) {
            return $this->json(['error' => 'Dish not found'], 404);
        }

        if (!is_array($cart)) {
            $cart = [];
        }

        $cart[] = $dish;

        $this->requestStack->getSession()->set('cart', $cart);

        return $this->json(['message' => 'Dish added to cart']);
    }


    public function deleteProduct($idDish): Response
    {
        $cart = $this->requestStack->getSession()->get('cart', []);

        foreach ($cart as $key => $dish) {
            if ($dish->getId() == $idDish) {
                unset($cart[$key]);
                $cart = array_values($cart);
                $this->requestStack->getSession()->set('cart', $cart);

                return $this->json(['message' => 'Dish removed from cart']);
            }
        }

        return $this->json(['error' => 'Dish not found in cart'], 404);
    }


    public function listProducts(): Response
    {
        $cart = $this->requestStack->getSession()->get('cart', []);

        return $this->json(['cart' => $cart]);
    }
}
