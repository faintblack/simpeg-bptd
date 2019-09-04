<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "diklat_pegawai".
 *
 * @property int $id_diklat
 * @property int $NIP
 * @property string $nama_diklat
 * @property string $tahun
 * @property string $durasi
 *
 * @property Pegawai $nIP
 */
class DiklatPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diklat_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diklat', 'NIP', 'nama_diklat', 'tahun', 'durasi'], 'required'],
            [['id_diklat', 'NIP'], 'integer'],
            [['tahun'], 'safe'],
            [['nama_diklat'], 'string', 'max' => 250],
            [['durasi'], 'string', 'max' => 16],
            [['id_diklat'], 'unique'],
            [['NIP'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['NIP' => 'NIP']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_diklat' => 'Id Diklat',
            'NIP' => 'N I P',
            'nama_diklat' => 'Nama Diklat',
            'tahun' => 'Tahun',
            'durasi' => 'Durasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIP()
    {
        return $this->hasOne(Pegawai::className(), ['NIP' => 'NIP']);
    }
}
