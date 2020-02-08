<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "golongan".
 *
 * @property int $id_golongan
 * @property string $kode_golongan
 * @property string $pangkat
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
            [['kode_golongan', 'pangkat'], 'required'],
            [['kode_golongan'], 'string', 'max' => 2],
            [['pangkat'], 'string', 'max' => 50],
            [['kode_golongan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_golongan' => 'Id Golongan',
            'kode_golongan' => 'Kode Golongan',
            'pangkat' => 'Pangkat',
        ];
    }
}
