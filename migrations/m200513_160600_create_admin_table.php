<?php
namespace abcms\admin\migrations;

use yii\db\Migration;
use Yii;

/**
 * Handles the creation of table `admin`.
 */
class m200513_160600_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique()->notNull(),
            'authKey' => $this->string(32)->notNull(),
            'accessToken' => $this->string(32),
            'passwordHash' => $this->string()->notNull(),
            'passwordResetToken' => $this->string()->unique(),
            'email' => $this->string()->unique()->notNull(),
            'active' => $this->boolean()->notNull()->defaultValue(0),
            'deleted' => $this->boolean()->notNull()->defaultValue(0),
            'createdTime' => $this->dateTime(),
            'updatedTime' => $this->dateTime(),
        ]);

        $this->insert('admin', [
            'username' => 'admin',
            'authKey' => Yii::$app->security->generateRandomString(),
            'passwordHash' => Yii::$app->security->generatePasswordHash('admin'),
            'email' => 'admin@yourdomain.tld',
            'active' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admin');
    }
}
