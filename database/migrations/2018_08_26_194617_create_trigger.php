<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER after_post_create AFTER INSERT ON posts FOR EACH ROW
            BEGIN
                UPDATE categories SET count = count + 1 WHERE id = NEW.category_id;
            END
        ');
        DB::unprepared('
        CREATE TRIGGER after_post_delete AFTER DELETE ON posts FOR EACH ROW
            BEGIN
                UPDATE categories SET count = count - 1 WHERE id = OLD.category_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER after_post_create');
        DB::unprepared('DROP TRIGGER after_post_delete');
    }
}
