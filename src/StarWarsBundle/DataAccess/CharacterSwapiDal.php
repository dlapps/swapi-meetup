<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\DataAccess;

use DL\StarWarsBundle\Entity\CharacterDto;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;

class CharacterSwapiDal
{
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @var SerializerInterface
     */
    protected $serializer;
    
    /**
     * CharacterSwapiDal constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->client     = new Client;
    }
    
    public function findByIndex(int $index): CharacterDto
    {
        $request = $this->client->get("https://swapi.co/api/people/${index}/");
        $data    = $this->serializer->deserialize($request->getBody()->getContents(), 'array', 'json');
        
        return new CharacterDto($data['name'], intval($data['height']), $index);
    }
}
