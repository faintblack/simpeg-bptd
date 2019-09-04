<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "golongan".
 *
 * @property int $id_golongan
 * @property string $golongan
 * @property string $pangkat
 *
 * @property Pegawai[] $pegawais
 */
class Golongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'golongan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['golongan', 'pangkat'], 'required'],
            [['golongan'], 'string', 'max' => 2],
            [['pangkat'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_golongan' => 'Id Golongan',
            'golongan' => 'Golongan',
            'pangkat' => 'Pangkat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['id_golongan' => 'id_golongan']);
    }
}
