<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>Search</h1>

<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'keywords'); ?>
	<?= Html::submitButton('Search', ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>