<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateInitialTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // Create admin table
        $admin = $this->table('admin', ['engine' => 'InnoDB', 'collation' => 'utf8_general_ci']);
        $admin->addColumn('username', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('date', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
                'null' => false
            ])
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();

        // Create page table
        $page = $this->table('page', ['engine' => 'InnoDB', 'collation' => 'utf8_general_ci']);
        $page->addColumn('page_name', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('content', 'string', ['limit' => 255, 'null' => false])
            ->addIndex(['page_name'], ['unique' => true])
            ->create();

        // Create posts table
        $posts = $this->table('posts', ['engine' => 'InnoDB', 'collation' => 'utf8_general_ci']);
        $posts->addColumn('title', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('description', 'text', ['null' => false])
            ->addColumn('slug', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('posted_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('date', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
                'null' => false
            ])
            ->create();
    }
}
