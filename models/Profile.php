<?php
/**
 * Created by PhpStorm.
 * User: Alisa
 * Date: 30/5/2559
 * Time: 14:28
 */

namespace ajnok\account\models;

use dektrium\user\models\Profile as BaseProfile;

class Profile extends BaseProfile
{
    public function rules()
    {
        $rules = parent::rules();
        $rules['firstnameLength'] = ['firstname', 'string', 'max' => 100];
        $rules['lastnameLength'] = ['lastname', 'string', 'max' => 100];
        $rules['phoneLength'] = ['phone', 'string', 'max' => 10];
        $rules['idcardLength'] = ['idcard', 'string', 'max'=>13];
        $rules['title_idIngeger'] = ['title_id', 'integer'];
        return $rules;
    }
}