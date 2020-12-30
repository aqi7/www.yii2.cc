<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_image".
 *
 * @property integer $id
 * @property string $image
 */
class MjImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_image';
    }
public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, gif, jpg', 'maxFiles' => 4],
        ];
    }    
    public function upload()
    {
        foreach ($this->imageFiles as $file) {
            $file->saveAs('./upload/' . $file->baseName . '.' . $file->extension);
        }
        return true;
    }
}
