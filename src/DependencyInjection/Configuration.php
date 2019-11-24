<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\FlusherBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('endroid_flusher');

        if (method_exists($treeBuilder, 'root')) {
            $rootNode = $treeBuilder->root('endroid_qr_code');
        } else {
            $rootNode = $treeBuilder->getRootNode();
        }

        $rootNode
            ->children()
                ->booleanNode('override_default_entity_manager')->defaultValue(false)->end()
                ->booleanNode('disable_entity_manager_flusher')->defaultValue(false)->end()
                ->scalarNode('step_size')->defaultValue(1.5)->end()
        ;

        return $treeBuilder;
    }
}
