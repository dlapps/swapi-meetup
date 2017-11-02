<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\BusinessLogic;

use DL\StarWarsBundle\DataAccess\CharacterDal;
use DL\StarWarsBundle\Entity\CharacterDto;
use DL\StarWarsBundle\Manager\CharacterManager;

class CharacterBll
{
    /**
     * @var CharacterDal
     */
    protected $doctrineDal;
    
    /**
     * @var CharacterManager
     */
    protected $characterManager;
    
    /**
     * CharacterBll constructor.
     *
     * @param CharacterDal     $doctrineDal
     * @param CharacterManager $characterManager
     */
    public function __construct(CharacterDal $doctrineDal, CharacterManager $characterManager)
    {
        $this->doctrineDal      = $doctrineDal;
        $this->characterManager = $characterManager;
    }
    
    public function create(CharacterDto $character): CharacterDto
    {
        return $this->characterManager->createOrUpdate($character);
    }
}
