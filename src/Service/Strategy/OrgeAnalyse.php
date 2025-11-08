<?php

declare(strict_types=1);

namespace App\Service\Strategy;

class OrgeAnalyse implements AnalyseCerealInterface
{
    public function supports(string $cereal): bool
    {
        return strtolower($cereal) === 'orge';
    }

    public function analyse(string $cereal): string
    {
        return "Analyse de l'orge : Excellente source de fibres, utilisée pour le malt et l'alimentation animale.";
    }
}
