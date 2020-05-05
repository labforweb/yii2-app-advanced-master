<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;

class Country extends ActiveRecord{

public static function tableName()
	    {
	        return 'country';
	    }


		public function rules()
		{
			return [
				[['name', 'population', 'code'], 'required'],
				
				[['name', 'population'], 'string'],
		
				['code', 'string', 'min' => 2, 'max' =>3],
		
		
			];
		}

}




?>
