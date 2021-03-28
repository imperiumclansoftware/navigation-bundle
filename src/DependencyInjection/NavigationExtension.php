<?php

namespace ICS\NavigationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class NavigationExtension extends Extension
{

    /**
     * {@inheritdoc}
    */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $configs=$this->processConfiguration($configuration,$configs);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config/'));
        $loader->load('services.yaml');

        $container->setParameter('navigation',$configs);


    }

}