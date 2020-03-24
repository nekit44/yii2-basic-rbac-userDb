

Yii 2 Basic Project Template is a init user and rbac

```bash
$ php yii migrate/up --migrationPath=@yii/rbac/migrations
$ php yii migrate
$ php yii rbac/migrate
```

use the following rbac URL:

```
http://localhost/path/to/index.php/rbac
http://localhost/path/to/index.php/rbac/route
http://localhost/path/to/index.php/rbac/permission
http://localhost/path/to/index.php/rbac/role
http://localhost/path/to/index.php/rbac/assignment
```

**Applying rules:**

1) For applying rules only for `controller` add the following code:
```php
use yii2mod\rbac\filters\AccessControl;

class ExampleController extends Controller 
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'allowActions' => [
                    'index',
                    // The actions listed here will be allowed to everyone including guests.
                ]
            ],
        ];
    }
}
```
2) For applying rules for `module` add the following code:
```php

use Yii;
use yii2mod\rbac\filters\AccessControl;

/**
 * Class Module
 */
class Module extends \yii\base\Module
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            AccessControl::class
        ];
    }
}
```
3) Also you can apply rules via main configuration:
```php
// apply for single module

'modules' => [
    'rbac' => [
        'class' => 'yii2mod\rbac\Module',
        'as access' => [
            'class' => yii2mod\rbac\filters\AccessControl::class
        ],
    ]
]

// or apply globally for whole application

'modules' => [
    ...
],
'components' => [
    ...
],
'as access' => [
    'class' => yii2mod\rbac\filters\AccessControl::class,
    'allowActions' => [
        'site/*',
        'admin/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
    ]
 ],

```