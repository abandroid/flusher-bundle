<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\FlusherBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class EndroidFlusherExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $processor = new Processor();
        $config = $processor->processConfiguration(new Configuration(), $configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $flusherDefinition = $container->getDefinition('Endroid\Flusher\Flusher');
        $flusherDefinition->addMethodCall('setStepSize', [$config['step_size']]);

        $managerDefinition = $container->getDefinition('Endroid\Flusher\FlusherEntityManager');
        $managerDefinition->addMethodCall('setFlusherEnabled', [!$config['disable_entity_manager_flusher']]);

        if (!$config['override_default_entity_manager']) {
            $container->removeDefinition('Endroid\Flusher\FlusherEntityManager');
        }
    }
}
