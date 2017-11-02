<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\Manager;

use DL\StarWarsBundle\Entity\CharacterDto;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CharacterManager
{
    /**
     * @var RegistryInterface
     */
    protected $registry;
    
    /**
     * @var ValidatorInterface
     */
    protected $validator;
    
    /**
     * CharacterManager constructor.
     *
     * @param RegistryInterface  $registry
     * @param ValidatorInterface $validator
     */
    public function __construct(RegistryInterface $registry, ValidatorInterface $validator)
    {
        $this->registry  = $registry;
        $this->validator = $validator;
    }
    
    /**
     * @param CharacterDto $character
     *
     * @return CharacterDto
     */
    public function createOrUpdate(CharacterDto $character): CharacterDto {
        $this->registry->getManager()->persist($character);
        $this->registry->getManager()->flush();
        
        return $character;
    }
}
