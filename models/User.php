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
//    public static $idcardRegexp = '/^[0-9]+$/';
//    public static $phoneRegexp = '/^[0-9]+$/';
    

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
//        $scenarios['register'][] = 'passcode';
//        return $scenarios;
        return ArrayHelper::merge($scenarios, [
            'register' => ['!passcode','firstname','lastname','idcard','phone'],
        ]);

    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['status_idInteger'] = ['status_id','integer'];
        $rules['status_idDefault'] = ['status_id','default','value'=>1];
        $rules['role_idIngeger'] = ['role_id','integer'];
        $rules['role_idDefault'] = ['role_id','default','value'=>1];
//        $rules['idcardString'] = ['idcard','string','length'=>13 ];
//        $rules['idcardTrim'] =['idcard','filter','filter'=>'trim'];
//        $rules['idcardPattern'] =['idcard','match','pattern' => $user::$idcardRegexp];
//        $rules['idcardRequired'] = ['idcard', 'required'];
//        $rules['idcardUnique']   = [
//            'phone',
//            'unique',
//            'targetClass' => $user,
//            'message' => Yii::t('user', 'This Phone Number has already been taken')
//        ];
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