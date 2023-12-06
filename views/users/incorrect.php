


<?php



use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


?>


            <?php $form = ActiveForm::begin([
    'action' => 'index.php?r=users/create'
]); ?>

<h6>You must have entered incorrect details .
    Kindly go back to add correct details or if you do not have an account ,
    kindly click on the below button to create one.

</h6>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>