<?php

namespace App\Controller;

use App\DataFixtures\ArticleFixtures;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Transport\Serialization\Serializer;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/post", name="app_api_post", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        // $articles = $articleRepository->findAll();

        // $articlesNormalizes = $normalizer->normalize($articles, null, ['groups' => 'article:read']);


        // dd($articlesNormalizes);
        // $json = json_encode($articlesNormalizes);

        // $json = $serializer->serialize($articles, 'json', ['groups' => 'article:read']);

        // dd($json, $articlesNormalizes);
        
        // $response = new JsonResponse($json, 200, [], true); possible d'écrire ça et d'effacer le content -type
        // $response = $this->json($articles, 200, [], ['groups' => 'article:read']); remplace le normalize et le content-type 
        //et l'encodage et enlever le normalize et $normalise dans les params
        // $response = new Response($json, 200, [
        //     "Content-Type" => "application/json"
        // ]);

       
        //Possible de réduire tout le code en une seule ligne enleve aussi les params normalize
        return $this->json($articleRepository->findAll(), 200, [], ['groups' => 'article:read']);
        
        // return $response;
    }

    /**
     * @Route("/api/post", name="app_api_post", methods={"POST"})
     */
    // public function store(Request $request, SerializerInterface $serializer, EntityManagerInterface)
    
    // {
    
    //     $jsonRecu = $request->getContent();
    //     $article = $serializer->deserialize($jsonRecu, Article::class, 'json');

    //     $article->setCreatedAt(new \DateTime());
        
    //     $em->persist($article);
    //     $em->flush();
    //     dd($article);

    //     return $this->json($article, 201, ['groups' => 'article:read']);

    // }
}
