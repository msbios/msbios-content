<?php
/**
 * @link http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MSBios\Content;

use Zend\Router\Http\Regex;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'may_terminate' => true,
                'child_routes' => [
                    'static' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => ':permalink[:format]',
                            'defaults' => [
                                'controller' => Controller\IndexController::class,
                            ],
                            'constraints' => [
                                'permalink' => '[\w\d\-]+',
                                'format' => '(/|\.html)?',
                            ]
                        ]
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                InvokableFactory::class,
        ]
    ],

    \MSBios\Theme\Module::class => [
        'themes' => [
            'default' => [
                'identifier' => 'default',
                'title' => 'Default Application Theme',
                'description' => 'Default Application Theme Description',
                'template_path_stack' => [
                    __DIR__ . '/../themes/default/view/',
                ],
                'translation_file_patterns' => [
                    [
                        'type' => 'gettext',
                        'base_dir' => __DIR__ . '/../themes/default/language/',
                        'pattern' => '%s.mo',
                    ],
                ],
                'widget_manager' => [
                    'template_map' => [
                    ],
                    'template_path_stack' => [
                        __DIR__ . '/../themes/default/widget/'
                    ],
                ],
            ]
        ]
    ]
];
