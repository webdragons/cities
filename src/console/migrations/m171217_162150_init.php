<?php

namespace bulldozer\cities\console\migrations;

use yii\db\Migration;

/**
 * Class m171217_162150_init
 * @package bulldozer\cities\console\migrations
 */
class m171217_162150_init extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(11)->unsigned(),
            'updated_at' => $this->integer(11)->unsigned(),
            'creator_id' => $this->integer(11)->unsigned(),
            'updater_id' => $this->integer(11)->unsigned(),
            'active' => $this->boolean()->defaultValue(false),
            'default' => $this->boolean()->defaultValue(false),
            'name' => $this->string(255)->notNull(),
            'slug' => $this->string(400),
            'emails_json' => $this->text(),
            'phones_json' => $this->text(),
            'address' => $this->text(),
            'working_time' => $this->text(),
            'lat' => $this->float(6),
            'lng' => $this->float(6),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%cities}}');
    }
}
