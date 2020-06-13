<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Competition;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->scenario == "create"): ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php endif; ?>
    
    <?= $form->field($model, 'password')->passwordInput() ?>
    
    <?= $form->field($model, 'active')->checkbox() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
