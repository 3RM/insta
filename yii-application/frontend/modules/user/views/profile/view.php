<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use dosamigos\fileupload\FileUpload;

?>

<h3><?= Html::encode($user->username); ?></h3>
<h3><?= HtmlPurifier::process($user->about); ?></h3>

<img src="<?= $user->getPicture(); ?>" id="profile-picture" alt="">
<?php if($currentUser): ?>
<?php if($currentUser->equals($user)): ?>
<div class="alert alert-success display-none" id="profile-image-success">Profile image updated</div>
<div class="alert alert-danger display-none" id="profile-image-fail"></div>

<?= FileUpload::widget([
    'model' => $modelPicture,
    'attribute' => 'picture',
    'url' => ['/user/profile/upload-picture'], // your url, this is just for demo purposes,
    'options' => ['accept' => 'image/*'],    
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
        						console.log(e);
                                console.log(data);
                                if(data.result.success){
                                	$("#profile-image-success").show();
                                	$("#profile-image-fail").hide();
                                	$("#profile-picture").attr("src", data.result.pictureUri);
                                }else{
                                	$("#profile-image-fail").html(data.result.errors.picture).show();
                                	$("#profile-image-success").hide();
                                }
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]); ?>
<?php endif; ?>
<?php endif; ?>