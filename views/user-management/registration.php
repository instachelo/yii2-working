<?php

use app\models\Cities;
use app\models\Gender;
use kartik\slider\Slider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Users;
use yii\web\View;

/* @var $this View */
/* @var $model Users */
/* @var $form ActiveForm */

$this->title = 'Registration';
$this->params['breadcrumbs'] = $this->title;
?>

<div class="registration col-xs-6">
    <?php
        $form = ActiveForm::begin([
            'method' => 'POST',
            'action' => Url::to(['user-management/registration'])
        ]);
    ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'age')->widget(Slider::className(), [
            'model' => $model,
            'sliderColor' => Slider::TYPE_DANGER,
            'pluginOptions' => [
                'orientation' => 'horizontal',
                'min'         => 18,
                'max'         => 100,
                'step'        => 1
            ]
    ]) ?>
    <?= $form->field($model, 'gender_id')->dropDownList(ArrayHelper::map(Gender::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(Cities::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 're_password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div>