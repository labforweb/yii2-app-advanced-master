<?php
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model {

//dichiariamo queste due proprietà della classe EntryForm
//che rappresentano i dati della form
    public $name;
    public $email;
    public $address;


    public function rules()
    {
        return [
            [['name', 'email', 'address'], 'required'],
            ['email', 'email'],
            ['address', 'string', 'min' => 20, 'max' =>30],


        ];
    }


}
