<?php

namespace app\models;

use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ITDepartment extends \app\models\Department {

    public function setValues() {
        $this->view_page = 'a';
        $this->test_variable = 'ABC';
    }

}
