<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "connection".
 *
 * @property int $id
 * @property string $name
 * @property int $ps_id
 * @property int $instruction_id
 * @property int $scheme_id
 *
 * @property Instruction $instruction
 * @property Ps $ps
 * @property Scheme $scheme
 * @property Instruction[] $instructions
 * @property Scheme[] $schemes
 */
class Connection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'connection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ps_id', 'instruction_id', 'scheme_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['instruction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instruction::className(), 'targetAttribute' => ['instruction_id' => 'id']],
            [['ps_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ps::className(), 'targetAttribute' => ['ps_id' => 'id']],
            [['scheme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scheme::className(), 'targetAttribute' => ['scheme_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'ps_id' => 'Ps ID',
            'instruction_id' => 'Instruction ID',
            'scheme_id' => 'Scheme ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstruction()
    {
        return $this->hasOne(Instruction::className(), ['id' => 'instruction_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPs()
    {
        return $this->hasOne(Ps::className(), ['id' => 'ps_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheme()
    {
        return $this->hasOne(Scheme::className(), ['id' => 'scheme_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructions()
    {
        return $this->hasMany(Instruction::className(), ['connection_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Scheme::className(), ['connection_id' => 'id']);
    }
}
