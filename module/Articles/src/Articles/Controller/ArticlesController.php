<?php

namespace Articles\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/*
  class ArticlesController extends AbstractActionController {

  public function indexAction() {
  return new ViewModel(array('message' => 'Bonjour le monde !'));
  }

  }
 */

class ArticlesController extends AbstractActionController {

    protected $articlesTable;
    /**
     * Obtention de l'instance de ArticlesTable
     * 
     * @return ArticlesTable
     */
    public function getArticlesTable() {
        if (!$this->articlesTable) {
            $sm = $this->getServiceLocator();
            $this->articlesTable = $sm->get('Articles\Model\ArticlesTable');
        }
        return $this->articlesTable;
    }
    /**
     * Affichage du tableau des articles
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function tableauAction()
    {
        return new ViewModel (array('articles' =>
            $this->getArticlesTable()->fetchAll()));
    }

}
