<?php

namespace App\Controller;

use App\Repository\QuizzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QuizzController extends AbstractController
{
    #[Route('/quizz', name: 'quizz', methods: ['GET', 'POST'])]
    public function index(Request $request, QuizzRepository $repository): Response
    {
        $quizz = $repository->findRandom();
        $result = null;

        if ($request->isMethod('POST')) {
            $selectedAnswer = (int) $request->request->get('answer');

            if ($selectedAnswer === $quizz->getGoodAnswer()) {
                $result = 'good';
            } else {
                $result = 'bad';
            }
        }

        return $this->render('quizz/index.html.twig', [
            'quizz' => $quizz,
            'result' => $result,
        ]);
    }
}