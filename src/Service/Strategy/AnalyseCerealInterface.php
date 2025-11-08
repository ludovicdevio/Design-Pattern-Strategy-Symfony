<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.analyse_cereal')]
interface AnalyseCerealInterface
{
    public function analyse(string $cereal): string;
    public function supports(string $cereal): bool;
}
