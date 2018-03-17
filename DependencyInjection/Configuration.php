<?php

namespace Tvswe\DatabaseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tvswe_database');

        $rootNode
            ->children()
                ->scalarNode('host')->end()
                ->scalarNode('port')->end()
                ->scalarNode('user')->end()
                ->scalarNode('password')->end()
                ->scalarNode('database')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
