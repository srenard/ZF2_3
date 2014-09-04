<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Log' => function($sm) {
        $log = new \Zend\Log\Logger();
        $writer = new \Zend\Log\Writer\Stream("log_r2.txt");
        $log->addWriter($writer);
        return $log;
    }
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Articles\Controller\Articles' => 'Articles\Controller\ArticlesController',
            'Articles\Controller\Pdf' => 'Articles\Controller\PdfController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'articles' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'articles' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/articles[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Articles\Controller\Articles',
                        'action' => 'tableau',
                    ),
                ),
            ),
            'pdf' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pdf',
                    'defaults' => array(
                        'controller' => 'Articles\Controller\Pdf',
                        'action' => 'fabrication'
                    )
                )
            )
        ),
    ),
);
