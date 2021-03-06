<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

/** @var \yii\db\ActiveRecord $model */
$model = new $generator->modelClass;
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
	$safeAttributes = $model->attributes();
}

echo "<?php\n";
?>
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this <?= $generator->getViewBaseClass(); ?> */
/* @var $form yii\widgets\ActiveForm */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

	<?= "<?php " ?>$form = ActiveForm::begin(); ?>

		<?= "<?= " ?>$form->errorSummary($model); ?>

<?php foreach ($safeAttributes as $attribute) {
	echo "\t\t<?= " . $generator->generateActiveField($attribute) . " ?>\n";
} ?>

		<div class="form-group">
			<?= "<?= " ?>Html::submitButton(Yii::t('yii', $model->isNewRecord ? 'Create' : 'Save'), [
				'class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
			]); ?>
		</div>

	<?= "<?php " ?>ActiveForm::end(); ?>

</div>
