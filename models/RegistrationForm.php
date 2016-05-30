<?php
/**
 * Created by PhpStorm.
 * User: Alisa
 * Date: 30/5/2559
 * Time: 14:26
 */

namespace ajnok\account\models;

use ajnok\account\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use ajnok\account\models\User;
use Yii;

class RegistrationForm extends BaseRegistrationForm
{
    public $title_id;
    public $firstname;
    public $lastname;
    public $idcard;
    public $phone;
    public $passcode;
    public $_code = 'oateam';
    public function rules()
    {
        $user = $this->module->modelMap['User'];
        $rules = parent::rules();
        //Title Rules
        $rules['titleidRequired'] = ['title_id','required'];
        $rules['titleidInteger'] = ['title_id','integer'];
        //First name Rules
        $rules['firstnameRequired'] = ['firstname','required'];
        $rules['firstnameTrim'] = ['firstname', 'filter', 'filter' => 'trim'];
        $rules['firstnameLength'] = ['firstname','string','max'=>100];
        //Last name Rules
        $rules['lastnameTrim'] = ['lastname', 'filter', 'filter' => 'trim'];
        $rules['lastnameLength'] = ['lastname','string','max'=>100];
        //ID Number Rules
        $rules['idcardString'] = ['idcard','string','length'=>13 ];
        $rules['idcardTrim'] =['idcard','filter','filter'=>'trim'];
        $rules['idcardPattern'] =['idcard','match','pattern' => $user::$idcardRegexp];
        $rules['idcardRequired'] = ['idcard', 'required'];
        $rules['idcardUnique']   = [
            'idcard',
            'unique',
            'targetClass' => $user,
            'message' => Yii::t('user', 'This ID Number has already been taken')
        ];
        //Phone Rules
        $rules['phoneString'] = ['phone','string','min'=>9,'max'=>10];
        $rules['phoneTrim'] =['phone','filter','filter'=>'trim'];
        $rules['phonePattern'] =['phone','match','pattern' => $user::$phoneRegexp];
        //Passcode Rules
        $rules['passcodeString'] = ['passcode','string','max'=>255];
        $rules['passcodeRequired'] = ['passcode','required'];
        $rules['passcodeValidate'] =['passcode',function($attr) {
            if (!($this->$attr === $this->_code))
            {
                $this->addError($attr, Yii::t('user', 'Your Given Passcode is not correct'));
            }
        }];
        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['title_id'] = \Yii::t('user', 'Title ID');
        $labels['firstname'] = \Yii::t('user', 'First Name');
        $labels['lastname'] = \Yii::t('user', 'Last Name');
        $labels['idcard'] = \Yii::t('user', 'ID Card Number');
        $labels['phone'] = \Yii::t('user', 'Phone Number');
        return $labels;
    }

    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'title_id' => $this->title_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'idcard' => $this->idcard,
            'phone' => $this->phone,
            'passcode' => $this->passcode,
        ]);
        $user->setProfile($profile);
    }

}