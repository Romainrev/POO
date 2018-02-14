<?php


namespace Application\Controller;

use Application\Model\Article\ArticleDb;
use Application\Model\Auteur\AuteurDb;
use Application\Model\Categorie\CategorieDb;
use Application\Model\Tags\Tags;
use Application\Model\Tags\TagsDb;
use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction(){

        # Connexipon à la BDD

        $this->render('news/index');

    }
    public function categorieAction(){
        $categorieDb = new CategorieDb;
        $categories  = $categorieDb->fetchAll();
        $this->render('news/categorie',['categorie' => $categories]);
    }
    public function articleAction(){
        $ArticleDb = new ArticleDb();
        $Article   = $ArticleDb->fetchAll();
        $this->render('news/article',['article' => $Article]);
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
}