<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\IngredientRepository;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient')]
    public function index(IngredientRepository $repository): Response
    {
        $ingredients = $repository->findAll();
        //dd($ingredients); == renvoie la liste de tous les ingrédients
        return $this->render('pages/ingredient/index.html.twig',['ingredients'=>$ingredients]);
    }
}
