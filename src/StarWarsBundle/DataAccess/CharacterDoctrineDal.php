<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\DataAccess;

use DL\StarWarsBundle\Entity\CharacterDto;
use Doctrine\ORM\EntityRepository;

/**
 * Defines data access for characters.
 *
 * @package DL\StarWarsBundle\DataAccess
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class CharacterDoctrineDal extends EntityRepository
{
    public function findByIndex(int $index): CharacterDto
    {
        $query = $this->getEntityManager()->createQuery(
            "
            SELECT c
            FROM {$this->getEntityName()} c
            WHERE c.creditIndex = :index
        "
        );
        
        $query->setParameters(
            [
                ':index' => $index,
            ]
        );
        $query->setMaxResults(1);
        
        return $query->getSingleResult();
    }
}
