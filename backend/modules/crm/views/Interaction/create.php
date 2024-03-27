<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\crm\models\Interaction $model */

$this->title = 'Create Interaction';
$this->params['breadcrumbs'][] = ['label' => 'Interactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
