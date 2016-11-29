<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $codP
 * @property integer $codD
 * @property string $nombreP
 * @property string $consumo
 * @property integer $precion
 * @property integer $saldo
 *
 * @property Departamento $codD0
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codP','nombreP'], 'required'],
            [['codD', 'precion', 'saldo'], 'integer'],
            [['codP'], 'string', 'max' => 4],
            [['nombreP'], 'string', 'max' => 50],
            [['consumo'], 'string', 'max' => 20],
            [['codD'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['codD' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codP' => 'Cod P',
            'codD' => 'Cod D',
            'nombreP' => 'Nombre P',
            'consumo' => 'Consumo',
            'precion' => 'Precion',
            'saldo' => 'Saldo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodD0()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'codD']);
    }
}
