<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {
    public $image;
    public function uploadFile(UploadedFile $file) {
        $this->image = $file;
        // Генерации уникального имени, чтобы не было перезаписи картинок.
        $filename = md5(uniqid($file->baseName)).'.'.$file->extension;
        $file->saveAs(Yii::getAlias('@web').'uploads/'.$filename);
        return $filename;
    }
}