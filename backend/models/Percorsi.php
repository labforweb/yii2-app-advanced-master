<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "percorsi".
 *
 * @property int $id_percorso
 * @property string $nome_percorso
 * @property int $durata
 * @property string $inizio
 * @property float $costo
 */
class Percorsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'percorsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_percorso', 'durata', 'inizio', 'costo'], 'required'],
            [['durata'], 'integer'],
            [['inizio'], 'safe'],
            [['costo'], 'number'],
            [['nome_percorso'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_percorso' => Yii::t('app', 'Id Percorso'),
            'nome_percorso' => Yii::t('app', 'Nome Percorso'),
            'durata' => Yii::t('app', 'Durata'),
            'inizio' => Yii::t('app', 'Inizio'),
            'costo' => Yii::t('app', 'Costo'),
        ];
    }
}
