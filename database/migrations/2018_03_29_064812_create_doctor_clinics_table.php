                   <?php

                   use Illuminate\Support\Facades\Schema;
                   use Illuminate\Database\Schema\Blueprint;
                   use Illuminate\Database\Migrations\Migration;

                   class CreateDoctorClinicsTable extends Migration
                   {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->string('name')->nullable();
            $table->integer('banner_image')->nullable();
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
        Schema::dropIfExists('doctor_clinics');
    }
}
