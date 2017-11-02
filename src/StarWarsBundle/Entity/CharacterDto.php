<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CharacterDto
 *
 * @package DL\StarWarsBundle\Entity
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @ORM\Entity(repositoryClass="DL\StarWarsBundle\DataAccess\CharacterDal")
 */
class CharacterDto
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(name="id", type="string")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(min="2", max="60")
     */
    protected $name;
    
    /**
     * @var int
     *
     * @ORM\Column(name="height", type="integer")
     * @Assert\NotNull()
     * @Assert\Type("int")
     */
    protected $height;
    
    /**
     * @var int
     *
     * @ORM\Column(name="credit_index", type="integer")
     * @Assert\NotNull()
     * @Assert\Type("int")
     */
    protected $creditIndex;
    
    /**
     * CharacterDto constructor.
     *
     * @param string $name
     * @param int    $height
     * @param int    $creditIndex
     */
    public function __construct(string $name, int $height, int $creditIndex = 0)
    {
        $this->name        = $name;
        $this->height      = $height;
        $this->creditIndex = $creditIndex;
    }
    
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
    
    /**
     * @return int
     */
    public function getCreditIndex(): int
    {
        return $this->creditIndex;
    }
}
