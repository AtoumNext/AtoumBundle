<?php

use atoum\AtoumBundle\Command\AtoumCommand;
use atoum\AtoumBundle\Configuration\Bundle;
use atoum\AtoumBundle\Configuration\BundleContainer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $container): void {
    $container->parameters()
        ->set('atoum.configuration.bundle.container.class', BundleContainer::class)
        ->set('atoum.configuration.bundle.class', Bundle::class);

    $services = $container->services();

    $services->set('atoum.configuration.bundle.container', '%atoum.configuration.bundle.container.class%');
    $services->alias(BundleContainer::class, 'atoum.configuration.bundle.container');

    $services->set(AtoumCommand::class)
        ->args([
            service('atoum.configuration.bundle.container'),
            service('kernel'),
        ])
        ->tag('console.command');
};
