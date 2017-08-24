<?php
/**
 * Created by PhpStorm.
 * User: serhii.korobov
 * Date: 8/15/2017
 * Time: 8:11 PM
 */

namespace frontend\models\user;


use frontend\models\User;

class Edit extends User
{
    public $new_password;

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [
            'new_password',
            'string',
            'min' => 6,
            'max' => 20
        ];

        return $rules;
    }

    public function load($data, $formName = null)
    {
        $result = parent::load($data, $formName);

        if ($this->new_password) {
            $this->setPassword($this->new_password);
        }

        return $result;
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        $result = parent::validate($attributeNames, $clearErrors);

        if ($result
            && $this->getIsNewRecord()
            && !$this->password_hash
        ) {
            $this->addError('new_password', \Yii::t('app', 'For new user password must be set'));
        }

        if (!$this->hasErrors()
            && \Yii::$app->user->getId() == $this->id
            && $this->role != self::ROLE_SUPER_ADMIN
        ) {
            $select = self::find();
            $select->andWhere(['role' => self::ROLE_SUPER_ADMIN]);
            $select->andWhere(['<>', 'id', \Yii::$app->user->getId()]);

            $s = $select->prepare(\Yii::$app->db->queryBuilder)->createCommand()->getRawSql();

            if (!$select->count()) {
                $this->addError('role', \Yii::t('app', 'You are the last one super administrator. You can not change your role'));
            }
        }

        return !$this->hasErrors();
    }
}