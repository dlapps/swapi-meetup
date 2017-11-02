<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Bundle semantic configuration.
 *
 * @package DL\StarWarsBundle\DependencyInjection
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class DLStarWarsConfiguration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $tree = new TreeBuilder;
        $tree->root('dl_star_wars');
        
        return $tree;
    }
    
}
