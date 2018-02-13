<?php


namespace Application\Controller;

use Application\Model\Categorie\CategorieDb;
use Core\Controller\AppController;

class NewsController extends AppController
{
    public function indexAction(){

        # Connexipon à la BDD
        $categorieDb = new CategorieDb;
        $categories  = $categorieDb->fetchAll();
        $this->render('news/index',['categories' => $categories]);
       // include_once PATH_VIEWS . '/news/index.php';
    }
    public function categorieAction(){
        echo 'JE SUIS CATEGORIE ACTION';
        $this->render('news/categorie',['categorie' => 'Front ou Back ?']);
    }
    public function articleAction(){
        echo 'JE SUIS ARTICLE ACTION';
        $this->render('news/article',['titre2' => 'Formation de developeur !']);
    }

}