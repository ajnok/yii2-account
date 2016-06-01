<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ajnok\account\models\Profile;
use yii\helpers\ArrayHelper;
use ajnok\account\models\Title;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => true,
                ]); ?>
<!--                 $form->field($model, 'title_id')->textInput(['enableAjaxValidation'=>false])-->
                <?= $form->field($model, 'title_id')->dropDownList(
                        ArrayHelper::map(Title::find()->all(),'title_id','name'),
                        [
                            'id' => 'ddl-title',
                            'prompt' => 'กรุณาเลือกคำนำหน้า'
                        ]
                    )
                ?>
                <?= $form->field($model, 'firstname')->textInput(['enableAjaxValidation'=>true,'maxlength'=>100]) ?>
                <?= $form->field($model, 'lastname')->textInput(['enableAjaxValidation'=>true,'maxlength'=>100]) ?>
                <?= $form->field($model, 'idcard')->textInput(['enableAjaxValidation'=>true,'maxlength'=>13]) ?>
                <?= $form->field($model, 'phone')->textInput(['enableAjaxValidation'=>false,'maxlength'=>10]) ?>
                <?= $form->field($model, 'passcode')->textInput(['enableAjaxValidation'=>false]) ?>
                <?= $form->field($model, 'email')->textInput(['maxlength'=>255]) ?>

                <?= $form->field($model, 'username')->textInput(['maxlength'=>25]) ?>

                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?php endif ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>
