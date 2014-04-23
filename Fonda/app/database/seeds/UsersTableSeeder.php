<?php
class UsersTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'username'  => 'admin',
            'name'=> 'Administrator',
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}
?>