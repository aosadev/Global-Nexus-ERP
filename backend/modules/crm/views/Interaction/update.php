<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\crm\models\Interaction $model */

$this->title = 'Update Interaction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Interactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="interaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
