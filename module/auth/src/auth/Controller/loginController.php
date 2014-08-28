<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use auth\Model\PersoStorage;
use auth\Form\formulaire;

class LoginController extends AbstractActionController {

    protected $formulaire;
    protected $storage;
    protected $authservice;

    public function getAuthService() {
        if (!$this->authservice) {
            $this->authservice = $this->getServiceLocator()
                    ->get('AuthService');
        }
        return $this->authservice;
    }

    public function getSessionStorage() {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()
                    ->get('auth\Model\PersoStorage');
        }
        return $this->storage;
    }

    public function getFormulaire() {
        if (!$this->formulaire) {
            $this->formulaire = new formulaire();
        }
        return $this->formulaire;
    }

    public function indexAction() {

        //si l'utilisateur est déjà logué, on affiche le tableau des articles
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('articles');
        }

        $form = $this->getFormulaire();
        return array(
            'form' => $form,
            'messages' => $this->flashmessenger()->getMessages()
        );
    }

    public function authenticateAction() {
        $form = $this->getFormulaire();
        $redirect = 'login';
        // Récupération de la requête
        $request = $this->getRequest();
        if ($request->isPost()) {
            // Récupération des données postées
            $form->setData($request->getPost());
            if ($form->isValid()) {
                // Authentification
                $this->getAuthService()->getAdapter()
                        ->setIdentity($request->getPost('login'))
                        ->setCredential($request->getPost('passe'));
                // Obtention de l'objet Zend\Authentication\Result                      
                $result = $this->getAuthService()->authenticate();
                foreach ($result->getMessages() as $message) {
                    //enregistrement provisoire dans flashmessenger
                    $this->flashmessenger()->addMessage($message);
                }
                if ($result->isValid()) {
                    $redirect = 'articles';
                    // 
                    if ($request->getPost('rememberme') == 1) {
                        $this->getSessionStorage()
                                ->setRememberMe(1);
                        // Création du stockage
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $storage = $this->getAuthService()->getStorage();
                    $identification = $this->getAuthService()
                            ->getAdapter()
                            ->getResultRowObject(null, 'utilisateurs_passe');
                    $this->getAuthService()->getStorage()->write($identification);
                }
            }
        }
        return $this->redirect()->toRoute($redirect);
    }

    /**
     * Non utilisé
     * @return type
     */
    public function logoutAction() {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();
        $this->flashmessenger()->addMessage("Vous avez été déconnecté");
        return $this->redirect()->toRoute('login');
    }

}
