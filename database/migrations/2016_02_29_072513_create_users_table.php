<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('grade');
            $table->integer('num_slots');
            $table->integer('hoursTutored');
            $table->integer('languageHours');
            $table->integer('scienceHours');
            $table->integer('mathHours');
            $table->integer('englishHours');
            $table->integer('artsHours');
            $table->integer('historyHours');
            $table->boolean('monday_after')->nullable();
            $table->boolean('tuesday_after')->nullable();
            $table->boolean('wednesday_after')->nullable();
            $table->boolean('thursday_after')->nullable();
            $table->boolean('friday_after')->nullable();
            $table->boolean('free_a1')->nullable();
            $table->boolean('free_a2')->nullable();
            $table->boolean('free_a3')->nullable();
            $table->boolean('free_a4')->nullable();
            $table->boolean('free_b1')->nullable();
            $table->boolean('free_b2')->nullable();
            $table->boolean('free_b3')->nullable();
            $table->boolean('free_b4')->nullable();
            $table->boolean('alg1_a')->nullable();
            $table->boolean('alg1_b')->nullable();
            $table->boolean('alg1')->nullable();
            $table->boolean('geometry')->nullable();
            $table->boolean('alg2trig')->nullable();
            $table->boolean('FST')->nullable();
            $table->boolean('accel_Math_1')->nullable();
            $table->boolean('accel_Math_2')->nullable();
            $table->boolean('precalc')->nullable();
            $table->boolean('discrete_math')->nullable();
            $table->boolean('AP_stats')->nullable();
            $table->boolean('AP_calc_AB')->nullable();
            $table->boolean('AP_calc_BC')->nullable();
            $table->boolean('biology')->nullable();
            $table->boolean('mo_bio')->nullable();
            $table->boolean('biotech')->nullable();
            $table->boolean('env_sci')->nullable();
            $table->boolean('forensic_sci')->nullable();
            $table->boolean('marine_bio')->nullable();
            $table->boolean('anatomy')->nullable();
            $table->boolean('zoology')->nullable();
            $table->boolean('APES')->nullable();
            $table->boolean('AP_Bio')->nullable();
            $table->boolean('physical_sci')->nullable();
            $table->boolean('chem')->nullable();
            $table->boolean('xl_chem')->nullable();
            $table->boolean('AP_chem')->nullable();
            $table->boolean('physics')->nullable();
            $table->boolean('earth_sci')->nullable();
            $table->boolean('eng_sci')->nullable();
            $table->boolean('AP_physics_1')->nullable();
            $table->boolean('AP_physics_2')->nullable();
            $table->boolean('AP_physics_c')->nullable();
            $table->boolean('a_goode_class')->nullable();
            $table->boolean('AP_studio_art_drawing')->nullable();
            $table->boolean('AP_studio_art_2D')->nullable();
            $table->boolean('AP_studio_art_3D')->nullable();
            $table->boolean('AP_art_history')->nullable();
            $table->boolean('AP_music_theory')->nullable();
            $table->boolean('spanish_nov')->nullable();
            $table->boolean('french_nov')->nullable();
            $table->boolean('chinese_nov')->nullable();
            $table->boolean('spanish_i_1')->nullable();
            $table->boolean('spanish_i_2')->nullable();
            $table->boolean('spanish_i_3')->nullable();
            $table->boolean('chinese_i_1')->nullable();
            $table->boolean('chinese_i_2')->nullable();
            $table->boolean('chinese_i_3')->nullable();
            $table->boolean('french_i_1')->nullable();
            $table->boolean('french_i_2')->nullable();
            $table->boolean('french_i_3')->nullable();
            $table->boolean('spanish_ih_1')->nullable();
            $table->boolean('spanish_ih_2')->nullable();
            $table->boolean('spanish_ih_3')->nullable();
            $table->boolean('chinese_ih_1')->nullable();
            $table->boolean('chinese_ih_2')->nullable();
            $table->boolean('chinese_ih_3')->nullable();
            $table->boolean('french_ih_1')->nullable();
            $table->boolean('french_ih_2')->nullable();
            $table->boolean('french_ih_3')->nullable();
            $table->boolean('spanish_adv')->nullable();
            $table->boolean('french_adv')->nullable();
            $table->boolean('AP_spanish')->nullable();
            $table->boolean('AP_chinese')->nullable();
            $table->boolean('AP_french')->nullable();
            $table->boolean('AT_chinese_history')->nullable();
            $table->boolean('chinese_nn')->nullable();
            $table->boolean('AP_chinese_nn')->nullable();
            $table->boolean('japanese_4')->nullable();
            $table->boolean('whistory')->nullable();
            $table->boolean('ushistory')->nullable();
            $table->boolean('apush')->nullable();
            $table->boolean('apeuro')->nullable();
            $table->boolean('apworld')->nullable();
            $table->boolean('aphumangeo')->nullable();
            $table->boolean('apusgov')->nullable();
            $table->boolean('apcompgov')->nullable();
            $table->boolean('econ')->nullable();
            $table->boolean('apecon')->nullable();
            $table->boolean('psych')->nullable();
            $table->boolean('appsych')->nullable();
            $table->boolean('eng9')->nullable();
            $table->boolean('eng10')->nullable();
            $table->boolean('aplang')->nullable();
            $table->boolean('aplit')->nullable();
            $table->boolean('amstudies')->nullable();
            $table->boolean('wstudies')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tutors');
    }
}
