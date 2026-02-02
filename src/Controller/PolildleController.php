<?php

namespace App\Controller;

use App\Repository\PoliticienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PolildleController extends AbstractController
{
    #[Route('/polildle', name: 'polildle')]
    public function index(): Response
    {
        return $this->render('polildle/index.html.twig');
    }

    #[Route('/polildle/guess', name: 'polildle_guess', methods: ['POST'])]
    public function guess(Request $request, PoliticienRepository $repository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $nom = $data['nom'] ?? '';

        $target = $repository->findDailyRandom();
        if (!$target) {
            return $this->json(['error' => 'Aucune donnée disponible'], 500);
        }

        $guessed = $repository->findOneBy(['nom' => $nom]);
        if (!$guessed) {
            return $this->json(['error' => 'Personnalité non trouvée'], 404);
        }

        $isCorrect = $guessed->getId() === $target->getId();

        $feedback = [
            'nom' => $guessed->getNom(),
            'photo' => $guessed->getPhoto(),
            'parti' => [
                'value' => $guessed->getParti(),
                'status' => $guessed->getParti() === $target->getParti() ? 'correct' : 'incorrect',
            ],
            'fonction' => [
                'value' => $guessed->getFonction(),
                'status' => $guessed->getFonction() === $target->getFonction() ? 'correct' : 'incorrect',
            ],
            'bord' => [
                'value' => $guessed->getBord(),
                'status' => $this->compareBord($guessed->getBord(), $target->getBord()),
            ],
            'anneeDebut' => [
                'value' => $guessed->getAnneeDebut(),
                'status' => $guessed->getAnneeDebut() === $target->getAnneeDebut() ? 'correct' : 'incorrect',
                'direction' => $guessed->getAnneeDebut() < $target->getAnneeDebut() ? 'up' : ($guessed->getAnneeDebut() > $target->getAnneeDebut() ? 'down' : null),
            ],
            'genre' => [
                'value' => $guessed->getGenre(),
                'status' => $guessed->getGenre() === $target->getGenre() ? 'correct' : 'incorrect',
            ],
            'republique' => [
                'value' => $guessed->getRepublique(),
                'status' => $guessed->getRepublique() === $target->getRepublique() ? 'correct' : 'incorrect',
            ],
            'isCorrect' => $isCorrect,
        ];

        return $this->json($feedback);
    }

    #[Route('/polildle/search', name: 'polildle_search', methods: ['GET'])]
    public function search(Request $request, PoliticienRepository $repository): JsonResponse
    {
        $query = $request->query->get('q', '');
        if (strlen($query) < 2) {
            return $this->json([]);
        }

        $results = $repository->searchByName($query);
        $data = array_map(fn($p) => ['nom' => $p->getNom(), 'photo' => $p->getPhoto()], $results);

        return $this->json($data);
    }

    private function compareBord(string $guessed, string $target): string
    {
        if ($guessed === $target) {
            return 'correct';
        }

        $order = ['gauche', 'centre', 'droite'];
        $gIndex = array_search($guessed, $order);
        $tIndex = array_search($target, $order);

        if (abs($gIndex - $tIndex) === 1) {
            return 'partial';
        }

        return 'incorrect';
    }
}
