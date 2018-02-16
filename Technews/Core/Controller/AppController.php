<?php

namespace Core\Controller;


class AppController
{
    private $_viewparams;

    /**
     * Permet de générer l'affichage de la vue passé en paramètre.
     * @param $view
     * @param array $viewparam
     */
    protected function render($view, array $viewparams = []) {

        # Récupération et affectation des paramètres de la Vue
        $this->_viewparams = $viewparams;

        # Permet d'acceder au tableau directement dans des variables
        extract($this->_viewparams);

        # Chargement du Header
        include_once  PATH_HEADER;

        # Chargement de la Vue
        include_once PATH_VIEWS . '/' . $view . '.php';

        # Chargement du Footer
        include_once PATH_FOOTER;

    }

    protected function renderJson(array $param){
        header('Content-Type: application/json');
        echo json_encode($param);
    }


    /**
     * Renvoi le tableau de paramètres de la vue
     * @return mixed
     */
    public function getViewparams()
    {
        return $this->_viewparams;
        # Je vais pouvoir accéder à mon tableau comme un objet

        $object = new \ArrayObject($this->_viewparams);
        $object->setFlags(\ArrayObject::ARRAY_AS_PROPS);
        return $object;
    }

    /**
     * Permet de débugger les paramètres de la vue ou le paramètre passé à la fonction.
     * @param string $params
     */
    public function debug($params =''){

        if(empty($params)) :
            $params = $this->_viewparams;
        endif;

        echo'<pre>';
        print_r($params);
        echo'</pre>';
    }
    public function getAction(){
        return empty($_GET['action']) ? 'accueil' : $_GET['action'];
    }
}