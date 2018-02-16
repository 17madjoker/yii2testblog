<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {
    public $image;
    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'],'file','extensions' => 'jpg,png']
        ];
    }
    public function uploadFile(UploadedFile $file,$currentImage)
    {
        $this->image = $file;
        if($this->validate())
        {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    public function getFolder()
    {
        return Yii::getAlias('@web').'uploads/';
    }

    public function generateFileName()
    {
        return md5(uniqid($this->image->baseName)).'.'.$this->image->extension;
    }

    public function deleteCurrentImage($currentImage)
    {
        if (is_file($this->getFolder().$currentImage))
        {
            unlink($this->getFolder().$currentImage);
        }
    }

    public function saveImage()
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getFolder().$filename);
        return $filename;
    }
}