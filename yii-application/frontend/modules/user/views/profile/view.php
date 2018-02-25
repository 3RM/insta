<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<h3><?= Html::encode($user->username); ?></h3>
<h3><?= HtmlPurifier::process($user->about); ?></h3>