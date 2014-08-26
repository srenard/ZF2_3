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

}
