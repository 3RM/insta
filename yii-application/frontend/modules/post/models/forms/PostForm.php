<?php 

namespace frontend\modules\post\models\forms;

use Yii;
use yii\base\Model;
use frontend\models\Post;
use frontend\models\User;
use Intervention\Image\ImageManager;

class PostForm extends Model
{
	const MAX_DESCRIPTIONS_LENGHT = 1000;

	public $picture;
	public $description;

	private $user;

	public function rules()
	{
		return [
			[['picture'], 'file',
				'skipOnEmpty' => false,
				'extensions' => ['jpg', 'png'],
				'checkExtensionByMimeType' => true,
				'maxSize' => $this->getMaxFileSize()],
			[['description'], 'string', 'max' => self::MAX_DESCRIPTIONS_LENGHT],
		];
	}

	public function __construct(User $user)
	{
		$this->user = $user;
		//$this->on(self::EVENT_AFTER_SAVE, [$this, 'resizePicture']);
	}

	
	public function afterSave($changedAttributes){
    	var_dump($this);die();
    	parent::afterSave($changedAttributes);    	
    	
	}

	/**
     * Resize image if needed
     */
    public function resizePicture($path)
    {
        /*$width = Yii::$app->params['postPicture']['maxWidth'];
        $height = Yii::$app->params['postPicture']['maxHeight'];

        $manager = new ImageManager(array('driver' => 'imagick'));

        $image = $manager->make('uploads/'.$path);     //    /tmp/11ro51

        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save();*/        //    /tmp/11ro51
        $width = Yii::$app->params['postPicture']['maxWidth'];
		$height = Yii::$app->params['postPicture']['maxHeight'];

		$path = "uploads/".$path;
		$imag = Yii::$app->image->load($path);
		$imag->resize($width, $height, Yii\image\drivers\Image::ADAPT)
		->background('#fff')
            ->save($path, 85);       //    /tmp/11ro51
        
    }

	public function save()
	{
		if($this->validate()){
			$post = new Post();
			$post->description = $this->description;
			$post->created_at = time();
			$post->filename = Yii::$app->storage->saveUploadedFile($this->picture);
			$post->user_id = $this->user->getId();
			//$this->resizePicture($post->filename);
			return $post->save(false);
		}
	}

	private function getMaxFileSize()
	{
		return Yii::$app->params['maxFileSize'];
	}
}