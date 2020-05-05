<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "percorsistudente".
 *
 * @property int $id
 * @property int $studenti_id
 * @property int $percorsi_id
 * @property string $pagato
 */
class Percorsistudente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'percorsistudente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['studenti_id', 'percorsi_id'], 'required'],
            [['studenti_id', 'percorsi_id'], 'integer'],
            [['pagato'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'studenti_id' => Yii::t('app', 'Studenti'),
            'percorsi_id' => Yii::t('app', 'Percorsi'),
            'pagato' => Yii::t('app', 'Pagato'),

        ];
    }


    public function getStudenti(){
	    return $this->hasOne(Studenti::className(), ['id_studente' => 'studenti_id']);
    }
    
    public function getPercorsi(){
	    return $this->hasOne(Percorsi::className(), ['id_percorso' => 'percorsi_id']);
    }



}
