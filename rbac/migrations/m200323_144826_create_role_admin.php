<?php

use yii2mod\rbac\migrations\Migration;

class m200323_144826_create_role_admin extends Migration
{
    public function safeUp()
    {
        $this->createRule('user', \yii2mod\rbac\rules\UserRule::class);
        $this->createRule('guest', \yii2mod\rbac\rules\GuestRule::class);
        $this->createRule('admin', \yii2mod\rbac\rules\GuestRule::class);
        $this->createRule('rbac',\yii2mod\rbac\rules\UserRule::class);

        $this->createRole('admin', 'Admin has all available permissions.');
        $this->createRole('rbac', 'Admin rbac.');
        $this->createRole('user', 'Authenticated user.', 'user');

        $this->createPermission('adminPermission', '');
        $this->createPermission('rbacPermission', '');

        $this->createPermission('/admin/*', '', 'admin');
        $this->createPermission('/rbac/*', '', 'rbac');
        $this->createPermission('/site/*', '', 'guest');

        $this->addChild('admin', '/admin/*');
        $this->addChild('admin', '/rbac/*');
        $this->addChild('admin', '/site/*');
        $this->addChild('user', '/site/*');
        $this->addChild('adminPermission', '/admin/*');
        $this->addChild('rbacPermission', '/rbac/*');


        $this->assign('admin', 1);
        $this->assign('rbac', 1);

    }

    public function safeDown()
    {
        echo "m200323_144826_create_role_admin cannot be reverted.\n";

        return false;
    }
}