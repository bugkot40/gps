<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instruction".
 *
 * @property int $id
 * @property int $connection_id
 * @property string $name
 *
 * @property Connection[] $connections
 * @property Connection $connection
 */
class Instruction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instruction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['connection_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['connection_id'], 'exist', 'skipOnError' => true, 'targetClass' => Connection::className(), 'targetAttribute' => ['connection_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'connection_id' => 'Connection ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConnections()
    {
        return $this->hasMany(Connection::className(), ['instruction_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConnection()
    {
        return $this->hasOne(Connection::className(), ['id' => 'connection_id']);
    }
}
