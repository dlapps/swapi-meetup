<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\DataAccess;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Retrieve factories from the entity manager.
 *
 * @package DL\StarWarsBundle\Entity
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class DoctrineRepositoryFactory
{
    /**
     * @var RegistryInterface
     */
    protected $registry;
    
    /**
     * DoctrineRepositoryFactory constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }
    
    /**
     * @param string $entityPath
     *
     * @return EntityRepository
     */
    public function create(string $entityPath): EntityRepository
    {
        return $this->registry->getEntityManager()->getRepository($entityPath);
    }
}
