<?php

namespace FS\SolrBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('fs_solr');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode->children()
            ->arrayNode('endpoints')
            ->useAttributeAsKey('name')
            ->prototype('array')
            ->children()
            ->scalarNode('host')->end()
            ->scalarNode('port')->end()
            ->scalarNode('path')->end()
            ->scalarNode('core')->end()
            ->scalarNode('timeout')->end()
            ->booleanNode('active')->defaultValue(true)->end()
            ->end()
            ->end()
            ->end()
//            ->arrayNode('clients')
//                ->useAttributeAsKey('name')
//                ->prototype('array')
//                    ->children()
//                        ->arrayNode('endpoints')
//                            ->prototype('scalar')->end()
//                        ->end()
//                    ->end()
//                ->end()
//            ->end()
            ->booleanNode('auto_index')->defaultValue(true)->end()
            ->end();

        return $treeBuilder;
    }
}
