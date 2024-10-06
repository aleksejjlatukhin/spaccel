<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m230104_122031_create_table_responds_mvp
 */
class m230104_122031_create_table_responds_mvp extends Migration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB CHARSET=utf8';
        }

        $this->createTable('responds_mvp', [
            'id' => $this->primaryKey(11)->unsigned(),
            'confirm_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'info_respond' => $this->string(255),
            'email' => $this->string(255),
            'date_plan' => $this->integer(11),
            'place_interview' => $this->string(255),
        ], $tableOptions);
    }

    /**
     * @return bool
     */
    public function down(): bool
    {
        return false;
    }
}