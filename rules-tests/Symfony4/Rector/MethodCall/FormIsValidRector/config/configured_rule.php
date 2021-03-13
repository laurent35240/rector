<?php

declare(strict_types=1);

use Rector\Symfony4\Rector\MethodCall\FormIsValidRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(FormIsValidRector::class);
};
