<?php

use yii\db\Migration;

class m160506_064505_add_img_path_to_backendusers extends Migration
{
    public function up()
    {
        $this->addColumn('backendusers', 'img_path', $this->text());
    }

    public function down()
    {
        $this->dropColumn('backendusers', 'img_path');
    }
}
