<?php
/**
 * Created by PhpStorm.
 * User: kot
 * Date: 10.02.19
 * Time: 8:41
 */

namespace app\classes;


use app\models\Question;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

class AdminDb
{
    public static function questionSave(Question $question, $testId)
    {
        $question->test_id = $testId;
        $question->save();
        $image = self::imageSave($question);
        $questionDb = Question::find()->where(['id' => $question->id])->one();
        $questionDb->image = $image;
        $questionDb->save();
    }

    private function imageSave($question)
    {
        $question->image = UploadedFile::getInstance($question, 'image');
        if ($question->image) {
            $directory = Yii::getAlias("images/questions/");
            $imageName = 'рис' . $question->id . '.' . $question->image->extension;
            $file = $directory . $imageName;
            $question->image->saveAs($file);
            chmod("$file", 0777);
            if (file_exists($file)) {
                self::imageOptimization($file);
            }
            return $imageName;
        }
    }

    private function imageOptimization($file)
    {
        $photo = Image::getImagine()->open($file);
//        $photo->thumbnail(new Box(3000, 3000))->save($file, ['quality' => 300]);
//                $imagineObj = new Imagine();
//                $imageObj = $imagineObj->open($file);
//                $imageObj->resize($photo->getSize()->widen(100))->save($file);
    }

}