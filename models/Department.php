<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $dept_name
 * @property string|null $dept_details
 *
 * @property Employee[] $employees
 */
class Department extends \yii\db\ActiveRecord {

    public $view_page = '';
    public $test_variable = '';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['dept_name'], 'required'],
            [['dept_name'], 'string', 'max' => 100],
            [['dept_details'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'dept_name' => 'Dept Name',
            'dept_details' => 'Dept Details',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees() {
        return $this->hasMany(Employee::className(), ['fk_dept_id' => 'id']);
    }

    public function init() {
        $this->view_page = 'a';
        $this->test_variable = 'ABC';
    }

    public function initiateChild() {
        // id = 1, dept_name = 'IT', dept_details = 'Information Tech'

        if ($this->dept_name == 'IT') {
            return ITDepartment::findOne($this->id);
        } else if ($this->dept_name == 'Support') {
            return SupportDepartment::findOne($this->id);
        } else {
            return OtherDepartment::findOne($this->id);
        }
    }

}
