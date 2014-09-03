<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'site\Controller\Pages' => 'site\Controller\PagesController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Pages' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'accueil' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/accueil',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'accueil'
                    ),
                ),
            ),
            'societe' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/societe',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'societe'
                    ),
                ),
            ),
            'histoire' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/histoire',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'histoire'
                    ),
                ),
            ),
            'histoire1' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/histoire1',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'histoire1'
                    ),
                ),
            ),
            'histoire2' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/histoire2',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'histoire2'
                    ),
                ),
            ),
            'histoire3' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/histoire3',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'histoire3'
                    ),
                ),
            ),
            'histoire4' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/histoire4',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'histoire4'
                    ),
                ),
            ),
            'histoire5' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/histoire5',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'histoire5'
                    ),
                ),
            ),
            'h2010' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/h2010',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'h2010'
                    ),
                ),
            ),
            'h2011' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/h2011',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'h2011'
                    ),
                ),
            ),
            'h2012' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/h2012',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'h2012'
                    ),
                ),
            ),
            'groupe' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/groupe',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'groupe'
                    ),
                ),
            ),
            'contact' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/contact',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'contact'
                    ),
                ),
            ),
            'message' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/message',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'message'
                    ),
                ),
            ),
            'plan' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/plan',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'plan'
                    ),
                ),
            ),
            'art' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/art',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Pages',
                        'action' => 'art'
                    ),
                ),
            ),
        ),
    ),
);

