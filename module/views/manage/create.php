<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = Yii::t('abcms.admin', 'Create Admin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('abcms.admin', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
