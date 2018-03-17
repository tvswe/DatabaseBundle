<?php

namespace Tvswe\DatabaseBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class TvsweDatabaseExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
        $loader->load('services.yaml');
                
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $def = $container->getDefinition('tvswe.database_bundle.database_connection');
        $def->replaceArgument(0, $config);
    }
}