<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'routestest\Controller\Voyage' => 'Routestest\Controller\VoyageController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'exercice' => array(
                'type' => 'Regex',
                'options' => array(
                    'route' => '/stats[/annee][/departement][/legume]',
                    'regex' => '/stats/(?<annee>[0-9]{4})/(?<departement>[0-9]{2})/(?<legume>[a-zA-Z]+)',
                    'spec' => '/stats/%annee%/%departement%/%legume%',
                    'defaults' => array(
                        'controller' => 'routestest\Controller\Voyage',
                        'action' => 'stat',
                    )
                ),
            ),
            'voyage2' => array(
                'type' => 'Regex', // type Regex
                'options' => array(
                    'route' => '/destination[/pays]',
                    'regex' => '/destination/(?<pays>[a-zA-Z]+)',
                    'spec' => '/voyage/%pays%',
                    'defaults' => array(
                        'controller' => 'routestest\Controller\Voyage',
                        'action' => 'accueil',
                    )
                ),
            ),
            'blog' => array(
                'type' => 'literal', // type literal
                'options' => array(
                    'route' => '/blog',
                    'defaults' => array(
                        'controller' => 'routestest\Controller\Voyage',
                        'action' => 'accueilblog',
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'articles' => array(
                        'type' => 'segment', // type segment
                        'options' => array(
                            'route' => '/[:id]',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'article',
                            )
                        )
                    ),
                    'auteurs' => array(
                        'type' => 'segment', // type segment
                        'options' => array(
                            'route' => '/[:auteur]',
                            'constraints' => array(
                                'auteur' => '[a-zA-Z]+'
                            ),
                            'defaults' => array(
                                'action' => 'auteur',
                            )
                        )
                    ),
                )
            ),
            'voyage' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/voyage',
                    'defaults' => array(
                        'controller' => 'routestest\Controller\Voyage',
                        'action' => 'accueil',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'routestest' => __DIR__ . '/../view',
        ),
    ),
);


