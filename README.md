# Yii2 ABCMS admin library

## Features:
* Admin CRUD.
* Admin pages: login, update profile.

## Install:
```bash
composer require abcms/yii2-library:dev-master
composer require abcms/yii2-admin:dev-master
```

## DB migrations
1- Add the migration namespaces in the console.php configuration file:
```php
'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationNamespaces' => [
            'abcms\library\migrations',
            'abcms\admin\migrations',
        ],
    ],
],
```

2- Run `./yii migrate`

## Add the admin-user module
```php
[
    'modules' => [
        'admin-user' => [
            'class' => 'abcms\admin\module\Module',
        ],
    ],
]
```

## Update the user component
Update `identityClass` and `loginUrl` from the user component in the web.php configuration file:
```php
'user' => [
    'identityClass' => 'abcms\admin\models\Admin',
    'enableAutoLogin' => true,
    'loginUrl' => ['/admin-user/user/login'],
],
```

## Login and change password
User **admin / admin** to login and don't forget to change the default password and email.