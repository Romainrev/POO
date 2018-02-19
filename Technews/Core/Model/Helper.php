<?php

namespace Core\Model;

trait Helper {
    public function generateUrl($controller, $action){
        return PATH_PUBLIC . '/' . $controller . $action;
    }

    /**
     * @param $mask
     * @param array $valeur
     */
    public function generateUfm($mask, array $valeur = []){
        # Générer le taableau des éléments à rechercher ($1, $2 ...)
        $search = [];
        foreach ($valeur as $key => $value){
            $search[]='$' . ++$key;
        }

        # On remplace les $1, $n ...par les valeurs dans le mask
        $url =str_replace($search, $valeur, $mask);

        # On retourne l'url complète
        return PATH_PUBLIC.'/'.$url;
    }

    /**
     * Permet de générer un Slug à partir d'un String
     * @param $text
     * @return String Slug
     * @see https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
     */
    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
