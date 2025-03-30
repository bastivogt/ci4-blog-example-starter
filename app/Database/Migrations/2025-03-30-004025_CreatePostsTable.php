<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;


class CreatePostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "null" => false,
                "auto_increment" => true
            ],
            "title" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => false
            ],
            "content" => [
                "type" => "TEXT",
                "null" => false
            ],
            "published" => [
                "type" => "BOOLEAN",
                "null" => false,
                "default" => true
            ]
        ]);

        $this->forge->addPrimaryKey("id");
        $this->forge->createTable("posts");
    }

    public function down()
    {
        $this->forge->dropTable("posts");
    }
}
