<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
return array(
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=fox;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
            => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Accueil',
                'route' => 'accueil',
                'pages' => array(
                    array(
                        'label' => 'Société',
                        'route' => 'societe'
                    ),
                    array(
                        'label' => 'Histoire',
                        'route' => 'histoire',
                        'pages' => array(
                            array(
                                'label' => 'Histoire1',
                                'route' => 'histoire1',
                            ),
                            array(
                                'label' => 'Histoire2',
                                'route' => 'histoire2',
                            ),
                            array(
                                'label' => 'Histoire3',
                                'route' => 'histoire3',
                            ),
                            array(
                                'label' => 'Histoire4',
                                'route' => 'histoire4',
                            ),
                            array(
                                'label' => 'Histoire5',
                                'route' => 'histoire5',
                                'pages' => array(
                                    array(
                                        'label' => 'H2010',
                                        'route' => 'h2010',
                                    ),
                                    array(
                                        'label' => 'H2011',
                                        'route' => 'h2011',
                                    ),
                                    array(
                                        'label' => 'H2012',
                                        'route' => 'h2012',
                                    ),
                                )
                            ),
                        )
                    ),
                    array(
                        'label' => 'Groupe',
                        'route' => 'groupe'
                    ),
                    array(
                        'label' => 'Contact',
                        'route' => 'contact',
                        'pages' => array(
                            array(
                                'label' => 'Message',
                                'route' => 'message'
                            ),
                            array(
                                'label' => 'Plan',
                                'route' => 'plan'
                            ),
                        )
                    ),
                ),
            )
        )
    ),
);