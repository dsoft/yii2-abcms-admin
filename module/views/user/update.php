<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = 'Update Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../manage/_form', [
        'model' => $model,
    ]) ?>

</div>
