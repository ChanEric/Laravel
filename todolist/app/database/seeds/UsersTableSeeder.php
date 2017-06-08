<?php
class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert(
            array(
                array('username'=>'bob', 'password'=> Hash::make('mdpbob')),
                array('username'=>'flo', 'password'=> Hash::make('3460'))
            )
        );
    }
}

?>