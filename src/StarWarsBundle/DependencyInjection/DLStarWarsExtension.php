<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Bundle service definition processing.
 *
 * @package DL\StarWarsBundle\DependencyInjection
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class DLStarWarsExtension extends Extension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->processConfiguration(new DLStarWarsConfiguration, $configs);
        $this->processServiceDefinition($container);
    }
    
    /**
     * @param ContainerBuilder $container
     */
    protected function processServiceDefinition(ContainerBuilder $container): void
    {
        $definitionFiles = [
            'dal.yml',
            'manager.yml',
            'bll.yml',
            'command.yml',
            'controller.yml',
        ];
        
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        
        /** @var string $file */
        foreach ($definitionFiles as $file) {
            $loader->load($file);
        }
    }
    
}
