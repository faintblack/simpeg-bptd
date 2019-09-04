<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "riwayat_pendidikan_pegawai".
 *
 * @property int $id_riwayat
 * @property int $NIP
 * @property string $tingkat_pendidikan
 * @property string $tempat_pendidikan
 * @property string $jurusan
 * @property string $tahun_lulus
 * @property string $kategori_tempat_pendidikan
 * @property string $kabupaten/kota
 * @property string $provinsi
 *
 * @property Pegawai $nIP
 */
class RiwayatPendidikanPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_pendidikan_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIP', 'tingkat_pendidikan', 'tempat_pendidikan', 'jurusan', 'tahun_lulus', 'kategori_tempat_pendidikan', 'kabupaten/kota', 'provinsi'], 'required'],
            [['NIP'], 'integer'],
            [['tahun_lulus'], 'safe'],
            [['tingkat_pendidikan', 'kategori_tempat_pendidikan'], 'string', 'max' => 16],
            [['tempat_pendidikan'], 'string', 'max' => 120],
            [['jurusan', 'kabupaten/kota', 'provinsi'], 'string', 'max' => 50],
            [['NIP'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['NIP' => 'NIP']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat' => 'Id Riwayat',
            'NIP' => 'N I P',
            'tingkat_pendidikan' => 'Tingkat Pendidikan',
            'tempat_pendidikan' => 'Tempat Pendidikan',
            'jurusan' => 'Jurusan',
            'tahun_lulus' => 'Tahun Lulus',
            'kategori_tempat_pendidikan' => 'Kategori Tempat Pendidikan',
            'kabupaten/kota' => 'Kabupaten/kota',
            'provinsi' => 'Provinsi',
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
