<?php

declare(strict_types=1);

namespace MarcinJozwikowski\EasyAdminPrettyUrls\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public const ROOT_NODE = 'easy_admin_pretty_urls';
    public const ROUTE_PREFIX_NODE = 'route_prefix';
    public const DEFAULT_DASHBOARD_NODE = 'default_dashboard';
    public const INCLUDE_MENU_INDEX_NODE = 'include_menu_index';
    public const DROP_ENTITY_FQCN_NODE = 'drop_entity_fqcn';

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::ROOT_NODE);
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode(self::ROUTE_PREFIX_NODE)
                    ->defaultValue('pretty')
                ->end()
                ->scalarNode(self::DEFAULT_DASHBOARD_NODE)
                    ->defaultValue('App\\Controller\\EasyAdmin\\DashboardController::index')
                ->end()
                ->booleanNode(self::INCLUDE_MENU_INDEX_NODE)
                    ->defaultFalse()
                ->end()
                ->booleanNode(self::DROP_ENTITY_FQCN_NODE)
                    ->defaultFalse()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
