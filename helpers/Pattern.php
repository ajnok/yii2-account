<?php
/**
 * Created by PhpStorm.
 * User: Alisa
 * Date: 31/5/2559
 * Time: 14:34
 */

namespace ajnok\account\helpers;

//use yii\helpers\StringHelper;
class Pattern
{
    private static $_idcardRegexp = '/^[0-9]+$/';
    private static $_phoneRegexp = '/^[0-9]+$/';
    private static $_nameRegexp = '/^[a-zA-Zก-๙เ ]+$/';
    private static $_nameEng = '/^[a-zA-Z]+$/';
    private static $_nameTh = '/^[ก-๙เ]+$/';
    
    public function getPattern($field)
    {
//        $model = strtolower(StringHelper::basename($className::className()));
        if($field==='name')
        {
            return self::$_nameRegexp;
        }elseif($field==='idcard')
        {
//            $arr = array('phone'=>self::$_phoneRegexp,'idcard'=>self::$_idcardRegexp);
            return self::$_idcardRegexp;
        }elseif($field==='phone')
        {
            return self::$_phoneRegexp;
        }elseif($field==='nameEng')
        {
            return self::$_nameEng;
        }elseif($field==='nameTh')
        {
            return self::$_nameTh;
        }
    }
}