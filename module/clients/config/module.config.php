<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Clients\Controller\Clients' => 'Clients\Controller\ClientsController',
            'Clients\Controller\Essai' => 'Clients\Controller\EssaiController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Clients' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'upload' => array(
                'type' => 'Zend\Mvc\Router\Http\literal',
                'options' => array(
                    'route' => '/upload',
                    'defaults' => array(
                        'controller' => 'Clients\Controller\Clients',
                        'action' => 'upload'
                    ),
                ),
            ),
            'clients' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/clients[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Clients\Controller\Clients',
                        'action' => 'formulaire',
                    ),
                ),
            ),
            // Test formulaire 1
            'formulaire1' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/formulaire1',
                    'defaults' => array(
                        'controller' => 'Clients\Controller\Essai',
                        'action' => 'test1'
                    )
                ),
            ),
            // Test formulaire 2
            'formulaire2' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/formulaire2',
                    'defaults' => array(
                        'controller' => 'Clients\Controller\Essai',
                        'action' => 'test2'
                    )
                ),
            )
        ),
    ),
);

