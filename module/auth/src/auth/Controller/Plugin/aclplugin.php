<?php

namespace Auth\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin,
    Zend\Session\Container as SessionContainer,
    Zend\Permissions\Acl\Acl,
    Zend\Permissions\Acl\Role\GenericRole as Role,
    Zend\Permissions\Acl\Resource\GenericResource as Resource;
// pour authentification
use auth\Model\PersoStorage;

class AclPlugin extends AbstractPlugin {

    public function autorisation($e) {
// Création des rôles

        $acl = new Acl();
        $acl->addRole(new Role('admin'));
        $acl->addRole(new Role('visiteur'));
// Création des ressources
        $acl->addResource(new Resource('Clients'));
        $acl->addResource(new Resource('Articles'))
                //->addResource(new Resource('login'))
                ->addResource(new Resource('entree'))
                ->addResource(new Resource('index'))
                ->addResource(new Resource('add'))
                ->addResource(new Resource('tableau'))
                ->addResource(new Resource('edit'));
        /*
                ->addResource(new Resource('voyage'))
                ->addResource(new Resource('societe'))
                ->addResource(new Resource('histoire'))
                ->addResource(new Resource('histoire1'))
                ->addResource(new Resource('histoire2'))
                ->addResource(new Resource('histoire3'))
                ->addResource(new Resource('histoire4'))
                ->addResource(new Resource('histoire5'))
                ->addResource(new Resource('h2010'))
                ->addResource(new Resource('h2011'))
                ->addResource(new Resource('h2012'))
                ->addResource(new Resource('groupe'))
                ->addResource(new Resource('contact'))
                ->addResource(new Resource('message'))
                ->addResource(new Resource('plan'))
                ->addResource(new Resource('art'))
                ->addResource(new Resource('valide'))
                ->addResource(new Resource('delete'))
                ->addResource(new Resource('fabrication'))
                ->addResource(new Resource('accueil'))
                ->addResource(new Resource('d1'))
                ->addResource(new Resource('formulaire'));
                 */
// Création des autorisations
        $acl->allow('visiteur', 'entree');
        $acl->allow('visiteur', 'index');
        $acl->allow('admin');
        //$acl->allow('visiteur', 'tableau');
        //$acl->allow('visiteur', 'add');
        //$acl->allow('visiteur', 'edit');
        /*
        $acl->allow('visiteur', 'voyage');
        $acl->allow('visiteur', 'accueil');
        $acl->allow('admin');

        $acl->allow('visiteur', 'societe');
        $acl->allow('visiteur', 'histoire');
        $acl->allow('visiteur', 'histoire1');
        $acl->allow('visiteur', 'histoire2');
        $acl->allow('visiteur', 'histoire3');
        $acl->allow('visiteur', 'histoire4');
        $acl->allow('visiteur', 'histoire5');
        $acl->allow('visiteur', 'h2010');
        $acl->allow('visiteur', 'h2011');
        $acl->allow('visiteur', 'h2012');

        $acl->allow('visiteur', 'groupe');
        $acl->allow('visiteur', 'contact');
        $acl->allow('visiteur', 'message');
        $acl->allow('visiteur', 'plan');
        $acl->allow('visiteur', 'art');

        $acl->allow('visiteur', 'delete');
        $acl->allow('visiteur', 'fabrication');

        $acl->allow('visiteur', 'valide');

        $acl->allow('visiteur', 'd1');

        $acl->allow('visiteur', 'formulaire');
         */
        //$acl->deny('admin', 'histoire');

        $action = $e->getRouteMatch()->getParams()['action'];
        $sm = $this->getController()
                ->getServiceLocator('authService');
        $session = $sm->get('AuthService')->getStorage()->read();
        if (isset($session->admin_auto)) {
            if ($session->admin_auto != '') {
                $role = $session->admin_auto;
            } else {
                $role = 'visiteur';
            }
        } else {
            $role = 'visiteur';
        }
        if (!$acl->isAllowed($role, $action)) {
            $url = '/';
            $response = $e->getResponse();
            $response->setStatusCode(302);
            $response->getHeaders()->addHeaderLine('Location', $url);
            $e->stopPropagation();
        }
    }

}