<?php

namespace Articles\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Articles\Model\Articles;
use Articles\Form\ArticlesForm;

use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

use Zend\Form\Annotation\AnnotationBuilder;
use Articles\Form\Annotation1Form;
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
    /*
    public function tableauAction() {
        return new ViewModel(array('articles' =>
            $this->getArticlesTable()->fetchAll()));
    }
    */
    public function tableauAction(){
        $sm = $this->getServiceLocator();
        $this->adaptateur = $sm->get('Zend\Db\Adapter\Adapter');
        $select = new Select('articles');
        $DbSelect = new DbSelect($select,$this->adaptateur);
        $paginateur = new Paginator($DbSelect);
        $paginateur->setCurrentPageNumber($this->params()->fromRoute('pages'));
        $vm = new ViewModel();
        $vm->setVariable('paginator',$paginateur);
        return $vm;
    }
    public function addAction() {
        echo "a1";
        $form = new ArticlesForm();
        $form->get('submit')->setValue('Add');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $article = new Articles();
            $form->setInputFilter($article->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $article->exchangeArray($form->getData());
                $this->getArticlesTable()->saveArticles($article);
                $this->getServiceLocator()->get('Zend\Log')->info('Bonjour');
                return $this->redirect()->toRoute('articles');
            }
        }
                echo "a2";
        $builder = new AnnotationBuilder();
        echo "a4";
        $AnnotationForm = new Annotation1Form();
        echo "a5";
        $form2 = $builder->createForm($AnnotationForm);
        echo "a6"; 
        return array('form' => $form,
                     'form2' => $form2);
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('articles', array(
                        'action' => 'add'
            ));
        }
        $article = $this->getArticlesTable()->getArticles($id);
        $form = new ArticlesForm();
        $form->bind($article);
        $form->get('submit')->setAttribute('value', 'Edit');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($article->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getArticlesTable()->saveArticles($form->getData());
                return $this->redirect()->toRoute('articles');
            }
        }
        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getArticlesTable()->deleteArticles($id);
            }
            // On redirige vers le tableau
            return $this->redirect()->toRoute('articles');
        }
        return array(
            'articles_id' => $id,
            'article' => $this->getArticlesTable()->getArticles($id)
        );
    }

}
