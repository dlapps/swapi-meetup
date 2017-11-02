<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\BusinessLogic;

use DL\StarWarsBundle\DataAccess\CharacterDoctrineDal;
use DL\StarWarsBundle\DataAccess\CharacterSwapiDal;
use DL\StarWarsBundle\Entity\CharacterDto;
use DL\StarWarsBundle\Manager\CharacterManager;
use Doctrine\ORM\NoResultException;

class CharacterBll
{
    /**
     * @var CharacterDoctrineDal
     */
    protected $doctrineDal;
    
    /**
     * @var CharacterManager
     */
    protected $characterManager;
    
    /**
     * @var CharacterSwapiDal
     */
    protected $swapiDal;
    
    /**
     * CharacterBll constructor.
     *
     * @param CharacterDoctrineDal $doctrineDal
     * @param CharacterManager     $characterManager
     * @param CharacterSwapiDal    $swapiDal
     */
    public function __construct(
        CharacterDoctrineDal $doctrineDal,
        CharacterManager $characterManager,
        CharacterSwapiDal $swapiDal
    ) {
        $this->doctrineDal      = $doctrineDal;
        $this->characterManager = $characterManager;
        $this->swapiDal         = $swapiDal;
    }
    
    public function create(CharacterDto $character): CharacterDto
    {
        return $this->characterManager->createOrUpdate($character);
    }
    
    public function findByIndex(int $index): CharacterDto
    {
        try {
            $instance = $this->doctrineDal->findByIndex($index);
        } catch (NoResultException $exception) {
            $instance = $this->swapiDal->findByIndex($index);
            $this->create($instance);
        }
        
        return $instance;
    }
}
