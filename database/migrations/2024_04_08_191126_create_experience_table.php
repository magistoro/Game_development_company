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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            // Здесь добавьте ваши нужные столбцы для хранения данных о выданном опыте
            $table->uuid('user_id');
            $table->unsignedInteger('experience');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
 
        // Триггер после вставки записи
        DB::unprepared('
            CREATE TRIGGER `after_experience_insert` AFTER INSERT ON `experiences`
            FOR EACH ROW
            BEGIN
                UPDATE `users`
                SET `experience` = ifnull(`experience`, 0) + NEW.experience
                WHERE `id` = NEW.user_id;
            END
            ');
 
        // Триггер после удаления записи
        DB::unprepared('
            CREATE TRIGGER `after_experience_delete` AFTER DELETE ON `experiences`
            FOR EACH ROW
            BEGIN
                UPDATE `users`
                SET `experience` = ifnull(`experience`, 0) - OLD.experience
                WHERE `id` = OLD.user_id;
            END
            ');
 
        // Триггер после обновления записи
        DB::unprepared('
            CREATE TRIGGER `after_experience_update` AFTER UPDATE ON `experiences`
            FOR EACH ROW
            BEGIN
                IF NEW.experience <> OLD.experience THEN
                    UPDATE `users`
                    SET `experience` = ifnull(`experience`, 0) - OLD.experience + NEW.experience
                    WHERE `id` = NEW.user_id;
                END IF;
            END
            ');
    }


    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
