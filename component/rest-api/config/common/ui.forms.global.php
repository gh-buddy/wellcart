<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */
return [
    'ui' => [
        'form' =>
            [
                'api_client' => [
                        'save'                   => [
                            'options'    => [
                                'fontAwesome' => [
                                    'icon' => 'check'
                                ],
                            ],
                            'attributes' => [
                                'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                            ],
                        ],

                        'save_and_continue_edit' => [
                            'options'    => [
                                'fontAwesome' => [
                                    'icon' => 'check-circle'
                                ],
                            ],
                            'attributes' => [
                                'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                            ],
                        ],

                        'user' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],
                        'client_id' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],

                        'new_secret' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],

                        'new_secret_verify' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],

                        'redirect_uri' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],
                ],

                'api_key' => [
                        'save'                   => [
                            'options'    => [
                                'fontAwesome' => [
                                    'icon' => 'check'
                                ],
                            ],
                            'attributes' => [
                                'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                            ],
                        ],

                        'save_and_continue_edit' => [
                            'options'    => [
                                'fontAwesome' => [
                                    'icon' => 'check-circle'
                                ],
                            ],
                            'attributes' => [
                                'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                            ],
                        ],

                        'client' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],

                        'public_key' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],

                        'private_key' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],

                        'encryption_algorithm' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],
                ],

                'api_scope' => [
                        'save'                   => [
                            'options'    => [
                                'fontAwesome' => [
                                    'icon' => 'check'
                                ],
                            ],
                            'attributes' => [
                                'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                            ],
                        ],

                        'save_and_continue_edit' => [
                            'options'    => [
                                'fontAwesome' => [
                                    'icon' => 'check-circle'
                                ],
                            ],
                            'attributes' => [
                                'class' => 'btn btn-toolbar-action btn-circle btn-success pull-right',
                            ],
                        ],

                        'is_default' => [
                            'options'    => [
                                'twb-layout'          => 'horizontal',
                                'column-size'         => 'md-12',
                                'label_attributes'    => [
                                    'class' => 'col-md-8 col-md-offset-4',
                                ],
                            ],
                            'attributes' => [
                                'class' => 'switchery-element',
                            ],
                        ],

                        'scope' =>             [
                            'options'    => [
                                'twb-layout'       => 'horizontal',
                                'column-size'      => 'md-8',
                                'label_attributes' => [
                                    'class' => 'col-md-4',
                                ],
                            ],
                        ],
                ],
            ]
    ]
];