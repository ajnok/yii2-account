<?php
/**
 * Created by PhpStorm.
 * User: Alisa
 * Date: 25/5/2559
 * Time: 14:49
 */

namespace ajnok\account\models;

use dektrium\user\models\User as BaseUser;
use yii\helpers\ArrayHelper;

class User extends BaseUser
{
    public static $idcardRegexp = '/^[0-9]+$/';
    public static $phoneRegexp = '/^[0-9]+$/';
    
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
//        $scenarios['register'][] = 'passcode';
//        return $scenarios;
//        return ArrayHelper::merge($scenarios, [
//            'register' => ['!passcode'],
//        ]);

    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        return $rules;
    }

//    public function getRule()
//    {
//        return $this->rules();
//    }
//
    public function getTest()
    {
        return "OK";
    }
}