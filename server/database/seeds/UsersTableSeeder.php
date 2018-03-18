<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region User

        $users = collect( [] );
        collect( [
            [
                'first_name' => 'Alex',
                'last_name' => 'Savchenko',
                'email' => 'asd@as.as',
                'password' => bcrypt('123456'),
            ] ,
        ] )->each( function( $data ) use ( &$users )
        {
            $users = $users->merge( factory( \App\Models\User::class , 1 )->create( $data ) );
        } );

        #endregion
    }
}
