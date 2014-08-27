<?php

namespace Clients\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Clients\Form\FormulaireComplexe;
use Clients\Model\Clients;
use Zend\I18n\Translator\Translator;
use Zend\Validator\AbstractValidator;
use Clients\Form\FormulaireFichier;

class ClientsController extends AbstractActionController {

    public function formulaireAction() {
        $reponse = new Clients('', 'Votre nom', "Votre prénom");
        $form = new FormulaireComplexe();
        $form->bind($reponse);
        if ($this->request->isPost()) {
            $form->setInputFilter($reponse->getInputFilter());
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                return new ViewModel(array(
                    'test' => $reponse,
                ));
            } else {
                return new ViewModel(array(
                    'formulaire' => $form,
                ));
            }
        } else {
            return new ViewModel(array('formulaire' => $form,
            ));
        }
    }

    public function uploadAction() {
        $form = new FormulaireFichier();
        if ($this->getRequest()->isPost()) {
        // Les données sur le fichier sont fusionnées avec les autres
            $post = array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), 
                    $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($post);
            if ($form->isValid()) {
                $data = $form->getData();
                move_uploaded_file($data['f']['tmp_name'], 'public/test.jpg');
                return new ViewModel(array(
                    'data' => $data,
                ));
            }
            exit();
        }
        return new ViewModel(array(
            'formulaire' => $form,
        ));
    }

}