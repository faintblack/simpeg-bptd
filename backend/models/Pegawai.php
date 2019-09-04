<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $NIP
 * @property string $nama
 * @property int $id_golongan
 * @property string $tmt_pangkat
 * @property string $jabatan
 * @property string $tmt_jabatan
 * @property string $tmt_cpns
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $catatan_mutasi
 *
 * @property DiklatPegawai[] $diklatPegawais
 * @property Golongan $golongan
 * @property RiwayatPendidikanPegawai[] $riwayatPendidikanPegawais
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIP', 'nama', 'id_golongan', 'tmt_pangkat', 'jabatan', 'tmt_jabatan', 'tmt_cpns', 'tempat_lahir', 'tanggal_lahir', 'catatan_mutasi'], 'required'],
            [['NIP', 'id_golongan'], 'integer'],
            [['tmt_pangkat', 'tmt_jabatan', 'tmt_cpns', 'tanggal_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 80],
            [['jabatan'], 'string', 'max' => 350],
            [['tempat_lahir'], 'string', 'max' => 50],
            [['catatan_mutasi'], 'string', 'max' => 250],
            [['NIP'], 'unique'],
            [['id_golongan'], 'exist', 'skipOnError' => true, 'targetClass' => Golongan::className(), 'targetAttribute' => ['id_golongan' => 'id_golongan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIP' => 'N I P',
            'nama' => 'Nama',
            'id_golongan' => 'Id Golongan',
            'tmt_pangkat' => 'Tmt Pangkat',
            'jabatan' => 'Jabatan',
            'tmt_jabatan' => 'Tmt Jabatan',
            'tmt_cpns' => 'Tmt Cpns',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'catatan_mutasi' => 'Catatan Mutasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiklatPegawais()
    {
        return $this->hasMany(DiklatPegawai::className(), ['NIP' => 'NIP']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolongan()
    {
        return $this->hasOne(Golongan::className(), ['id_golongan' => 'id_golongan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPendidikanPegawais()
    {
        return $this->hasMany(RiwayatPendidikanPegawai::className(), ['NIP' => 'NIP']);
    }
}
