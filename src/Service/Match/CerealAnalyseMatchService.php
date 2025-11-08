<?php

declare(strict_types=1);

namespace App\Service\Match;


class CerealAnalyseMatchService
{
    /**
     * Analyse un céréal en utilisant l'expression match (PHP 8+)
     */
    public function analyserCereal(string $cereal): string
    {
        // Approche avec match - plus moderne que if/else mais toujours sans pattern
        return match (strtolower($cereal)) {
            'ble' => $this->analyserBle($cereal),
            'orge' => $this->analyserOrge($cereal),
            'tournesol' => $this->analyserTournesol($cereal),
            default => throw new \InvalidArgumentException(
                sprintf('Aucune analyse disponible pour le céréal: %s', $cereal)
            ),
        };
    }

    private function analyserBle(string $cereal): string
    {
        return "Analyse du blé (MATCH) : Riche en glucides et protéines, idéal pour la panification.";
    }

    private function analyserOrge(string $cereal): string
    {
        return "Analyse de l'orge (MATCH) : Excellente source de fibres, utilisée pour le malt et l'alimentation animale.";
    }

    private function analyserTournesol(string $cereal): string
    {
        return "Analyse du tournesol (MATCH) : Très riche en huile et vitamine E, parfait pour la production d'huile alimentaire.";
    }
}
