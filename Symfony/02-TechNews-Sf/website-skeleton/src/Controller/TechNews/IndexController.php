<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19/02/2018
 * Time: 12:07
 */

namespace App\Controller\TechNews;


use App\Entity\Article;
use App\Entity\Categorie;
use App\Service\Article\ArticleProvider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    public function index() {
      #  return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
       # $articles = $articleProvider->getArticles()
        $article = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $spotlight = $this->getDoctrine()->getRepository(Article::class)->findSpotlightArticles();
        return $this->render('index/index.html.twig', [
            'articles' => $article, 'spotlight' => $spotlight
        ]);

    }

    /**
     * Page permettant d'afficher les articles d'une catégorie
     * @Route("/categorie/{libellecategorie}",name="index_categorie",methods={"GET"})
     * @param $libellecategorie
     * @return Response
     */
    public function categorie($libellecategorie = 'tout') {

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy(
                ['libelle' => $libellecategorie]
            );

        $articles = $categorie->getArticle();

        return $this->render('index/categorie.html.twig', [
            'articles' => $articles
        ]);

    }
    /**
     * @param $libellecategorie
     * @param $titrearticle
     * @param $idarticle
     * @return Response
     * @Route("/{libellecategorie}/{slugarticle}_{id}.html",name="index_article",requirements={"id" = "\d+"},methods={"GET"})
     */
    public function article(Article $article){
        # http://localhost:8000/business/une-formation-symfony-a-paris_1.html

        # Récupération avec Doctrine
        #$article = $this->getDoctrine()
          #  ->getRepository(Article::class)
          #  ->find($idarticle);

        # Si aucun article n'est trouvé...
        if(!$article) :

            # On génère une exception
            #throw $this->createNotFoundException(
            #    "Nous n'avons pas trouvé votre article ID : $idarticle"
            #);

            # Ou on peut aussi rediriger l'utilisateur sur la page index
            return $this->redirectToRoute('index',[],Response::HTTP_MOVED_PERMANENTLY);

        endif;
        $suggestions = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticleSuggestions($article->getId(),$article->getCategorie()->getId());

        return $this->render('index/article.html.twig', [
            'article' => $article, 'suggestions' => $suggestions
        ]);

    }

    public function sidebar() {

        # Récupération du Répository
        $repository = $this->getDoctrine()->getRepository(Article::class);

        # Récupération des 5 derniers articles
        $articles   = $repository->findLastFiveArticle();

        # Récupération des articles à la position "special"
        $special    = $repository->findSpecialArticles();

        return $this->render('components/_sidebar.html.twig', [
            'articles'  => $articles,
            'special'   => $special
        ]);

    }
}