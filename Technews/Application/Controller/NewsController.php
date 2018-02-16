<?php


namespace Application\Controller;

use Application\Model\Article\ArticleDb;
use Application\Model\Auteur\AuteurDb;
use Application\Model\Categorie\CategorieDb;
use Application\Model\Tags\Tags;
use Application\Model\Tags\TagsDb;
use Core\Controller\AppController;
use Core\Model\DbFactory;
use Core\Model\ORM;

class NewsController extends AppController
{
    public function indexAction(){

        # Connexipon à la BDD
        $articleDb = new ArticleDb;

        # Récupération des articles
        $articles = $articleDb->fetchAll();

        # Récupération des articles en Spotlight
        $spotlight = $articleDb->fetchAll('SPOTLIGHTARTICLE = 1');

        $this->render('news/index',[
            'articles' => $articles,
            'spotlight' => $spotlight
        ]);

    }
    public function categorieAction(){
        $categorieDb = new CategorieDb;
        $categories  = $categorieDb->fetchAll();
        $this->render('news/categorie');
    }
    public function articleAction(){
        DbFactory::IdiormFactory();
        $idarticle      = $_GET['idarticle'];
        $article        = ORM::for_table('view_articles')->find_one($idarticle);
        $tags           = ORM::for_table('tags')->where('IDTAGS', $idarticle)->find_result_set();
        $suggestions    = ORM::for_table('view_articles')->where('IDCATEGORIE', $article->IDCATEGORIE)->limit(3)->find_result_set();
        $auteur         = ORM::for_table('auteur')->where('IDAUTEUR', $article->IDAUTEUR)->find_one();
        $this->render('news/article', ['article'=>$article, 'tags'=>$tags, 'suggestions'=>$suggestions ,'auteur'=>$auteur]);

        # Récupération des Articles de la Catégorie (suggestions)

        # Je récupère uniquement, les articles de la même
        # catégorie que mon article

        # Sauf mon article en cours

        # 3 articles maximum

        # Par ordre décroissant

        # Je récupère les résultats

        # Transmission à la Vue.
    }
    public function auteurAction(){
        $AuteurDb = new AuteurDb();
        $Auteur   = $AuteurDb->fetchAll();
        $this->render('news/auteur', ['auteur' => $Auteur]);
    }
    public function tagsAction(){
        $TagsDb = new TagsDb();
        $Tags   = $TagsDb->fetchAll();
        $this->render('new/tags', ['tags' =>$Tags]);
    }
    public function businessAction(){
        $articleDb = new ArticleDb();
        $article= $articleDb->fetchAll('IDCATEGORIE = 2');
        $this->render('news/categorie', ['articles' => $article]);
    }
    public function computingAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 3');
        $this->render('news/categorie',['articles'=>$article]);
    }
    public function techAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 4');
        $this->render('news/categorie',['articles'=>$article]);
    }

    public function idiormAction(){
        # Récupération des catégories
        DbFactory::IdiormFactory();
        $auteurs = ORM::for_table('auteur')->find_result_set();

      //  $this->debug($categories);
        foreach ($auteurs as $auteur) :
            echo $auteur->NOMAUTEUR .'<br>';
        endforeach;
    }


}