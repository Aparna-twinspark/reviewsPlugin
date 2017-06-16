<?php
use Migrations\AbstractMigration;

class ChangeUrlAttributesInReviewSettings extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $users = $this->table('review_settings');
        $users->changeColumn('url', 'string', array('null' => true))
              ->save();
    }

     public function down()
    {
        $users = $this->table('review_settings');
        $users->changeColumn('url', 'string', array('null' => false))
              ->save();
    }
}
