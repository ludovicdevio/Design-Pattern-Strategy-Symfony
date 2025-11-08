<?php

declare(strict_types=1);

namespace App\Service\If;


class CerealAnalyseIfService
{
    /**
     * Analyse un céréal en utilisant des if/else (approche traditionnelle)
     */
    public function analyserCereal(string $cereal): string
    {
        // Approche avec des if/else - plus difficile à maintenir et étendre
        if (strtolower($cereal) === 'ble') {
            return $this->analyserBle($cereal);
        } elseif (strtolower($cereal) === 'orge') {
            return $this->analyserOrge($cereal);
        } elseif (strtolower($cereal) === 'tournesol') {
            return $this->analyserTournesol($cereal);
        } else {
            throw new \InvalidArgumentException(
                sprintf('Aucune analyse disponible pour le céréal: %s', $cereal)
            );
        }
    }

    private function analyserBle(string $cereal): string
    {
        return "Analyse du blé (IF) : Riche en glucides et protéines, idéal pour la panification.";
    }

    private function analyserOrge(string $cereal): string
    {
        return "Analyse de l'orge (IF) : Excellente source de fibres, utilisée pour le malt et l'alimentation animale.";
    }

    private function analyserTournesol(string $cereal): string
    {
        return "Analyse du tournesol (IF) : Très riche en huile et vitamine E, parfait pour la production d'huile alimentaire.";
    }
}
