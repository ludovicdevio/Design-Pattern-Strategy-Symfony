<?php

declare(strict_types=1);

namespace App\Service\Strategy;

class BleAnalyse implements AnalyseCerealInterface
{
    public function supports(string $cereal): bool
    {
        return strtolower($cereal) === 'ble';
    }

    public function analyse(string $cereal): string
    {
        return "Analyse du blé : Riche en glucides et protéines, idéal pour la panification.";
    }
}
