<?php

namespace Application\Model\Article;


use Core\Model\DbTable;

class ArticleDb extends DbTable
{
    protected $_table      = 'article';
    protected $_primary    = 'IDCARTICLE';
    protected $_classToMap = Article::class;
}