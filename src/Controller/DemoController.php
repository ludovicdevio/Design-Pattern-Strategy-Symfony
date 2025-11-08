<?php

namespace App\Controller;

use App\Service\Strategy\CerealAnalyseManager;
use App\Service\If\CerealAnalyseIfService;
use App\Service\Match\CerealAnalyseMatchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DemoController extends AbstractController
{
    public function __construct(
        private readonly CerealAnalyseManager $cerealAnalyseManager,
        private readonly CerealAnalyseIfService $cerealAnalyseIfService,
        private readonly CerealAnalyseMatchService $cerealAnalyseMatchService
    ) {
    }

    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('demo/home.html.twig');
    }

    #[Route('/if', name: 'app_demo_if')]
    public function demoIf(): Response
    {
        // Création d'exemples de céréales
        $cereals = [
            'Ble',
            'Orge',
            'Tournesol',
            'Colza', // Céréal sans analyse
        ];

        $analyses = [];

        // Analyse de chaque céréal en utilisant des if/else
        foreach ($cereals as $cereal) {
            try {
                $analyse = $this->cerealAnalyseIfService->analyserCereal($cereal);
                $analyses[] = [
                    'cereal' => $cereal,
                    'analyse' => $analyse,
                    'success' => true,
                ];
            } catch (\InvalidArgumentException $e) {
                $analyses[] = [
                    'cereal' => $cereal,
                    'error' => $e->getMessage(),
                    'success' => false,
                ];
            }
        }

        return $this->render('demo/if.html.twig', [
            'analyses' => $analyses,
            'method' => 'if/else',
        ]);
    }

    #[Route('/match', name: 'app_demo_match')]
    public function demoMatch(): Response
    {
        // Création d'exemples de céréales
        $cereals = [
            'Ble',
            'Orge',
            'Tournesol',
            'Colza', // Céréal sans analyse
        ];

        $analyses = [];

        // Analyse de chaque céréal en utilisant l'expression match
        foreach ($cereals as $cereal) {
            try {
                $analyse = $this->cerealAnalyseMatchService->analyserCereal($cereal);
                $analyses[] = [
                    'cereal' => $cereal,
                    'analyse' => $analyse,
                    'success' => true,
                ];
            } catch (\InvalidArgumentException $e) {
                $analyses[] = [
                    'cereal' => $cereal,
                    'error' => $e->getMessage(),
                    'success' => false,
                ];
            }
        }

        return $this->render('demo/match.html.twig', [
            'analyses' => $analyses,
            'method' => 'match',
        ]);
    }

    #[Route('/pattern', name: 'app_demo_pattern')]
    public function demoPattern(): Response
    {
        // Création d'exemples de céréales
        $cereals = [
            'Ble',
            'Orge',
            'Tournesol',
            'Colza', // Céréal sans stratégie d'analyse
        ];

        $analyses = [];

        // Analyse de chaque céréal en utilisant le pattern Strategy
        foreach ($cereals as $cereal) {
            try {
                $analyse = $this->cerealAnalyseManager->analyserCereal($cereal);
                $analyses[] = [
                    'cereal' => $cereal,
                    'analyse' => $analyse,
                    'success' => true,
                ];
            } catch (\InvalidArgumentException $e) {
                $analyses[] = [
                    'cereal' => $cereal,
                    'error' => $e->getMessage(),
                    'success' => false,
                ];
            }
        }

        return $this->render('demo/pattern.html.twig', [
            'analyses' => $analyses,
            'strategies_count' => 3, // Nombre fixe de stratégies disponibles
        ]);
    }

}
