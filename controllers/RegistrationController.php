<?php
/**
 * Created by PhpStorm.
 * User: Alisa
 * Date: 30/5/2559
 * Time: 14:19
 */

namespace ajnok\account\controllers;

use dektrium\user\controllers\RegistrationController as BaseController;
use ajnok\account\models\RegistrationForm;
use Yii;
class RegistrationController extends BaseController
{
    public function init()
    {
        parent::init();
    }

    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        $model = Yii::createObject(RegistrationForm::className());
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->register()) {

            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            return $this->render('/message', [
                'title'  => Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
            ]);
        }

        return $this->render('register', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
}