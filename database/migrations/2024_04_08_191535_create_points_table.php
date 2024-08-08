<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
           // Здесь добавьте ваши нужные столбцы для хранения данных о выданных баллах
           $table->uuid('user_id');
           $table->unsignedInteger('points');

           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->timestamps();
       });

       // Триггер после вставки записи
       DB::unprepared('
           CREATE TRIGGER `after_points_insert` AFTER INSERT ON `points`
           FOR EACH ROW
           BEGIN
               UPDATE `users`
               SET `points` = ifnull(`points`, 0) + NEW.points
               WHERE `id` = NEW.user_id;
           END
           ');

       // Триггер после удаления записи
       DB::unprepared('
           CREATE TRIGGER `after_points_delete` AFTER DELETE ON `points`
           FOR EACH ROW
           BEGIN
               UPDATE `users`
               SET `points` = ifnull(`points`, 0) - OLD.points
               WHERE `id` = OLD.user_id;
           END
           ');

       // Триггер после обновления записи
       DB::unprepared('
           CREATE TRIGGER `after_points_update` AFTER UPDATE ON `points`
           FOR EACH ROW
           BEGIN
               IF NEW.points <> OLD.points THEN
                   UPDATE `users`
                   SET `points` = ifnull(`points`, 0) - OLD.points + NEW.points
                   WHERE `id` = NEW.user_id;
               END IF;
           END
           ');
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
