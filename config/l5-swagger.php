<?php

$host = env('APP_URL', 'http://localhost:80');

return [
  'default' => 'v1',
  'documentations' => [
    'v1' => [
      'api' => [
        'title' => 'L5 Swagger UI V1',
      ],
      'routes' => [
        'api' => '/v1/documentation',
        'docs' => 'docs-v1',
        'oauth2_callback' => 'api/oauth2-callback-v1',
        'middleware' => [
          'api' => ['web'],
          'asset' => [],
          'docs' => ['web'],
          'oauth2_callback' => [],
        ],
      ],
      'securityDefinitions' => [
        'securitySchemes' => [
          'bearer_token' => [ // Unique name of security
            'type' => 'http',
            'description' => 'Authorization token obtained from logging in.',
            'name' => 'Authorization',
            'in' => 'header',
            'scheme' => 'bearer',
          ],
        ]
      ],
      'paths' => [
        'docs_json' => 'api-v1-docs.json',
        'docs_yaml' => 'api-v1-docs.yaml',
        'annotations' => [
          base_path('app/Http/Controllers/Api/V1'),
        ],
      ],
    ],
  ],
  'defaults' => [
    'routes' => [
      /*
       * Route for accessing parsed swagger annotations.
      */
      'docs' => 'docs',

      'middleware' => [],

      /*
       * Route Group options
      */
      'group_options' => [],
    ],

    'paths' => [
      /*
       * Absolute path to location where parsed annotations will be stored
      */
      'docs' => storage_path('api-docs'),

      /*
       * Absolute path to directory where to export views
      */
      'views' => base_path('resources/views/vendor/l5-swagger'),

      /*
       * Edit to set the api's base path
      */
      'base' => env('L5_SWAGGER_BASE_PATH', null),

      /*
       * Edit to set path where swagger ui assets should be stored
      */
      'swagger_ui_assets_path' => env('L5_SWAGGER_UI_ASSETS_PATH',
        'vendor/swagger-api/swagger-ui/dist/'),

      /*
       * Absolute path to directories that should be exclude from scanning
      */
      'excludes' => [],
    ],

    /*
     * API security definitions. Will be generated into documentation file.
    */
    'securityDefinitions' => [
      'securitySchemes' => [
        /*
         * Examples of Security schemes
        */

        /*
        'bearer_token' => [ // Unique name of security
          'type' => 'http',
          'description' => 'Authorization token obtained from logging in.',
          'name' => 'Authorization',
          'in' => 'header',
          'scheme' => 'bearer',
        ],
        */

        /*
        'oauth2_security_example' => [ // Unique name of security
            'type' => 'oauth2', // The type of the security scheme. Valid values are "basic", "apiKey" or "oauth2".
            'description' => 'A short description for oauth2 security scheme.',
            'flow' => 'implicit', // The flow used by the OAuth2 security scheme. Valid values are "implicit", "password", "application" or "accessCode".
            'authorizationUrl' => 'http://example.com/auth', // The authorization URL to be used for (implicit/accessCode)
            //'tokenUrl' => 'http://example.com/auth' // The authorization URL to be used for (password/application/accessCode)
            'scopes' => [
                'read:projects' => 'read your projects',
                'write:projects' => 'modify projects in your account',
            ]
        ],
        */

        /*
        'passport' => [ // Unique name of security
            'type' => 'oauth2', // The type of the security scheme. Valid values are "basic", "apiKey" or "oauth2".
            'description' => 'Laravel passport oauth2 security.',
            'in' => 'header',
            'scheme' => 'https',
            'flows' => [
                "password" => [
                    "authorizationUrl" => config('app.url') . '/oauth/authorize',
                    "tokenUrl" => config('app.url') . '/oauth/token',
                    "refreshUrl" => config('app.url') . '/token/refresh',
                    "scopes" => []
                ],
            ],
        ],
        */

      ],
      'security' => [
        /*
         * Examples of Securities
        */
        [
          /*
          'oauth2_security_example' => [
              'read',
              'write'
          ],

          'passport' => []
          */
        ],
      ],
    ],

    /*
     * Set this to `true` in development mode so that docs would be regenerated on each request
     * Set this to `false` to disable swagger generation on production
    */
    'generate_always' => env('L5_SWAGGER_GENERATE_ALWAYS', false),

    /*
     * Set this to `true` to generate a copy of documentation in yaml format
    */
    'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false),

    /*
     * Edit to trust the proxy's ip address - needed for AWS Load Balancer
     * string[]
    */
    'proxy' => false,

    /*
     * Configs plugin allows to fetch external configs instead of passing them to SwaggerUIBundle.
     * See more at: https://github.com/swagger-api/swagger-ui#configs-plugin
    */
    'additional_config_url' => null,

    /*
     * Apply a sort to the operation list of each API. It can be 'alpha' (sort by paths alphanumerically),
     * 'method' (sort by HTTP method).
     * Default is the order returned by the server unchanged.
    */
    'operations_sort' => env('L5_SWAGGER_OPERATIONS_SORT', null),

    /*
     * Pass the validatorUrl parameter to SwaggerUi init on the JS side.
     * A null value here disables validation.
    */
    'validator_url' => null,

    /*
     * Uncomment to add constants which can be used in annotations
     */
    'constants' => [
      'ADMIN_HOST' => $host.'/api/admin',
      'V1_HOST' => $host.'/api/v1',
      'V2_HOST' => $host.'/api/v2',
    ],
  ],
];