<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $test_id
 * @property string $link
 * @property string $question
 * @property string $answer
 * @property string $image
 * @property int $use
 *
 * @property Test $test
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'use'], 'integer'],
            [['question', 'answer'], 'string'],
            [['question', 'answer'], 'required'],
            [['link'], 'string', 'max' => 255],
            [['image'], 'file'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'link' => 'Ссылка',
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'image' => 'Рисунок',
            'use' => 'Use',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
}
