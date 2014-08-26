<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Clients\Controller\Clients' => 'Clients\Controller\ClientsController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Clients' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
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
        ),
    ),
);

