<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\Command;

use DL\StarWarsBundle\BusinessLogic\CharacterBll;
use DL\StarWarsBundle\Entity\CharacterDto;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCharacterCommand extends Command
{
    /**
     * @var CharacterBll
     */
    protected $characterBll;
    
    /**
     * @inheritDoc
     */
    public function __construct($name = null, CharacterBll $characterBll)
    {
        parent::__construct($name);
        $this->characterBll = $characterBll;
    }
    
    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this
            ->setName('meetup:character:create')
            ->addArgument('name')
            ->addArgument('height')
            ->addArgument('credit_index');
    }
    
    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name        = $input->getArgument('name');
        $height      = intval($input->getArgument('height'));
        $creditIndex = intval($input->getArgument('credit_index'));
        
        $character = new CharacterDto($name, $height, $creditIndex);
        $this->characterBll->create($character);
        
        $output->writeln("Character {$character->getName()} was created with ID {$character->getId()}");
    }
}
