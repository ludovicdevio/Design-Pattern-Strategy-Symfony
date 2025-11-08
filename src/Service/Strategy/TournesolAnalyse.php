<?php

declare(strict_types=1);

namespace App\Service\Strategy;

class TournesolAnalyse implements AnalyseCerealInterface
{
    public function supports(string $cereal): bool
    {
        return strtolower($cereal) === 'tournesol';
    }

    public function analyse(string $cereal): string
    {
        return "Analyse du tournesol : Très riche en huile et vitamine E, parfait pour la production d'huile alimentaire.";
    }
}
