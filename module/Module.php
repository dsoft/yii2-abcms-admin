<?php

namespace abcms\admin\module;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'abcms\admin\module\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'user';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
