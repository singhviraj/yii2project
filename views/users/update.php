<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = 'Update Users: ' . $model->id;


$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>

<div class="users-update">

    <h1><?php 
 if($model->access == 'admin'  ||  $model->access == 'manager'){   
 echo Html::encode($this->title) ;} 
 ?></h1>

<?php 
if($model->access == 'admin' ||  $model->access == 'manager'){
 echo $this->render('_form', [
        'model' => $model,
    ]) ;
 }
 else{
    echo"Do not have proper auterization to update the table";
 }
    ?>

</div>
