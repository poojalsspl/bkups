<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "state_collegecount_view".
 *
 * @property int $tot
 * @property string|null $state_name
 */
class StateCollegecountView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state_collegecount_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tot'], 'integer'],
            [['state_name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tot' => 'Tot',
            'state_name' => 'State Name',
        ];
    }
}
