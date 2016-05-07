<?php

use yii\db\Migration;

class m160506_062515_create_post extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'body' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('post');
    }
}
