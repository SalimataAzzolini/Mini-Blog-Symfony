<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="app_blog")
     * @Route("/api/articles")
     */
    public function index(ArticleRepository $repo): Response
    {

        $articles = $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this-> render ('blog/home.html.twig', [
        'title' => "Bienvenue ici les amis ",
        'age' => "28"]
    );

    }
/**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(ArticleRepository $repo, $id){
    $article = $repo->find($id);
     return $this->render('blog/show.html.twig', [
        'article' => $article
     ]);   
    }
}
