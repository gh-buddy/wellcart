<?php
/**
 * WellCart Platform
 *
 * @copyright  Copyright (c) 2017 WellCart Development Team    http://wellcart.org/
 * @license    http://www.opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace WellCart\RestApi;

/**
 * The user entity is always stored in another namespace than ZF\OAuth2
 */
$userEntity = 'WellCart\User\Entity\User';

return [
    'zf-versioning'      => [
        'uri' => [],
    ],
    'zf-oauth2-doctrine' => [
        'default' => [
            'object_manager'          => 'doctrine.entitymanager.orm_default',
            'event_manager'           => 'doctrine.eventmanager.orm_default',
            'driver'                  => 'doctrine.driver.orm_default',
            'enable_default_entities' => false,
            'bcrypt_cost'             => 14, # match zfcuser
            'auth_identity_fields'    => ['email'],

            'mapping' => [
                'User' => [
                    'entity' => $userEntity,
                ],

                'Client'      => [
                    'entity' => Entity\OAuth2\Client::class,
                ],
                'AccessToken' => [
                    'entity' => Entity\OAuth2\AccessToken::class,
                ],

                'RefreshToken' => [
                    'entity' => Entity\OAuth2\RefreshToken::class,
                ],

                'AuthorizationCode' => [
                    'entity' => Entity\OAuth2\AuthorizationCode::class,
                ],

                'Jwt' => [
                    'entity' => Entity\OAuth2\Jwt::class,
                ],

                'Jti' => [
                    'entity' => Entity\OAuth2\Jti::class,
                ],

                'Scope' => [
                    'entity' => Entity\OAuth2\Scope::class,
                ],

                'PublicKey' => [
                    'entity' => Entity\OAuth2\PublicKey::class,
                ],
            ],
        ],
    ],
    'zf-mvc-auth'        => [
        'authentication' => [
            'adapters' => [
                'oauth2_doctrine' => [
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => [
                        'storage' => 'oauth2.doctrineadapter.default',
                        'route'   => '/api/oauth',
                    ],
                ],
            ],
        ],
    ],
    'zf-oauth2'          => [
        'allow_implicit'  => true,
        // default (set to true when you need to support browser-based or mobile apps)
        'access_lifetime' => 3600,
        // default (set a value in seconds for access tokens lifetime)
        'enforce_state'   => true,  // default
        'storage'         => 'oauth2.doctrineadapter.default',
    ],
];