<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LaRepubliqueController extends AbstractController
{
    #[Route('/', name: 'la_republique')]
    public function index(): Response
    {
        return $this->render('la_republique/larepublique.html.twig', [
            'controller_name' => 'LaRepubliqueController',
        ]);
    }
}
