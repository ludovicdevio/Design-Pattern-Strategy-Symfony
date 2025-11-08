<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class CerealAnalyseManager
{
    public function __construct(
        /** @var iterable<AnalyseCerealInterface> */
        #[AutowireIterator(tag: 'app.analyse_cereal')]
        private iterable $strategies
    )
    {
    }

    /**
     * Analyse un céréal en utilisant la stratégie appropriée
     */
    public function analyserCereal(string $cereal): string
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($cereal)) {
                return $strategy->analyse($cereal);
            }
        }

        throw new \InvalidArgumentException(
            sprintf('Aucune stratégie d\'analyse trouvée pour le céréal: %s', $cereal)
        );
    }
}
