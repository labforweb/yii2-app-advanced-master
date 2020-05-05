<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studenti".
 *
 * @property int $id_studente
 * @property string $nome
 * @property string $cognome
 */
class Studenti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'studenti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cognome'], 'required'],
            [['nome', 'cognome'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_studente' => Yii::t('app', 'Id Studente'),
            'nome' => Yii::t('app', 'Nome'),
            'cognome' => Yii::t('app', 'Cognome'),
        ];
    }
}
