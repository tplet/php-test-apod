<?php


namespace App\Nasa\ApodBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ApodExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $container->setParameter('nasa.apod.api.apod.url', $config['api']['url']);
        $container->setParameter('nasa.apod.api.apod.api_key', $config['api']['api_key']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Ressources/config'));
        $loader->load('services.yml');
    }

}