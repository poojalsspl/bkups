<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "college_mast".
 *
 * @property int $college_code
 * @property string|null $college_name
 * @property int|null $total_students
 * @property int|null $city_code
 * @property string|null $city_name
 * @property int|null $state_code
 * @property string|null $state_name
 * @property int|null $country_code
 * @property string|null $country_name
 * @property string $prospectus
 * @property int|null $univ_code
 */
class CollegeMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_students', 'city_code', 'state_code', 'country_code', 'univ_code'], 'integer'],
            [['prospectus'], 'required'],
            [['college_name'], 'string', 'max' => 100],
            [['city_name'], 'string', 'max' => 50],
            [['state_name', 'country_name'], 'string', 'max' => 25],
            [['prospectus'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'college_code' => 'College Code',
            'college_name' => 'College Name',
            'total_students' => 'Total Students',
            'city_code' => 'City Code',
            'city_name' => 'City Name',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'prospectus' => 'Prospectus',
            'univ_code' => 'Univ Code',
        ];
    }

    public function getCollegeName($clg)
    {
        $query = (new \yii\db\Query())
        ->select('college_name')
        ->from('college_mast')
        ->where('college_code=:college_code', [':college_code' => $clg]);
        $command = $query->createCommand();
        $rows = $command->queryAll();
         return $rows[0]['college_name'];
     }
}
