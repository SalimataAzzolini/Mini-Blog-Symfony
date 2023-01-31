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
        # mis à la place articleRepository en param en dependance
        # $repo = $this->getDoctrine()->getRepository(Article::class);

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
        'age' => "31"]
    );

    }
/**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(ArticleRepository $repo, $id){
    #possible d'écrire aussi en param (Article $article) et d'effacer la ligne dessous
    #$repo = $this->getDoctrine()->getRepository(Article::class);
    $article = $repo->find($id);
     return $this->render('blog/show.html.twig', [
        'article' => $article
     ]);   
    }
}
