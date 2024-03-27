<?php

use app\modules\crm\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use zhuravljov\yii\pagination\LinkPager;

/** @var yii\web\View $this */
/** @var app\modules\crm\models\CustomerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

<p class="text-end">
    <?= Html::a('<i class="fas fa-plus"></i> Create', ['create'], ['class' => 'btn btn-success me-2']) ?>
</p>
<p class="text-end">
    <?= Html::button('<i class="fas fa-search"></i> Búsqueda Avanzada', ['class' => 'btn btn-info', 'id' => 'toggle-search']) ?>
</p>


    <div id="advanced-search" style="display:none;">
    <?= $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    </div>

    <div id="customer-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '<div class="float-right"> Showing results {begin} - {end} out of {totalCount}</div><br>',
        'layout'=> "{items} {summary} {pager}",
        'pager' => [
            'class' => LinkPager::class,
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
        ],
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [
            'name',
            'address',
            'phone',
            'email:email',
            //'industry',
            //'created_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Customer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
    </div>


</div>
<?php
$script = <<< JS
$("#toggle-search").click(function() {
    $("#advanced-search").slideToggle("fast");
});
JS;
$this->registerJs($script, \yii\web\View::POS_READY);
?>