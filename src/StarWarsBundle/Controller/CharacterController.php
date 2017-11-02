<?php
declare(strict_types=1);


namespace DL\StarWarsBundle\Controller;

use DL\StarWarsBundle\BusinessLogic\CharacterBll;
use DL\StarWarsBundle\Entity\CharacterDto;
use JMS\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CharacterController
 *
 * @package DL\StarWarsBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/character")
 */
class CharacterController extends Controller
{
    /**
     * @param Request             $request
     * @param CharacterBll        $characterBll
     * @param SerializerInterface $serializer
     *
     * @return Response
     * @Route("/")
     * @Method({"POST"})
     */
    public function createAction(
        Request $request,
        CharacterBll $characterBll,
        SerializerInterface $serializer
    ): Response {
        /** @var CharacterDto $characterDto */
        $characterDto = $serializer->deserialize($request->getContent(), CharacterDto::class, 'json');
        
        $characterBll->create($characterDto);
        
        return new Response(
            $serializer->serialize($characterDto, 'json'), Response::HTTP_CREATED, [
                'Content-Type' => 'application/json',
            ]
        );
    }
    
    /**
     * @param int                 $index
     * @param SerializerInterface $serializer
     *
     * @return Response
     *
     * @Method({"GET"})
     * @Route("/index/{index}")
     */
    public function findByIndex(int $index, CharacterBll $characterBll, SerializerInterface $serializer): Response
    {
        $character = $characterBll->findByIndex($index);
        
        return new Response(
            $serializer->serialize($character, 'json'), Response::HTTP_CREATED, [
                'Content-Type' => 'application/json',
            ]
        );
    }
}
