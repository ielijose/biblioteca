<?php

class UserTableSeeder extends Seeder {

	public function run()
	{

		User::create(array(
			'full_name' => 'Eli José Carrasquero',
			'phone' => '+58 424 602 9989',
			'picture' => 'image.jpg',
			'description' => 'Bio',
			'email' => 'user@gmail.com',
			'password' => \Hash::make('2512'),
			'username' => 'ielijose',
			'type' => 'user'
			));

		User::create(array(
			'full_name' => 'Ulises Fernández',
			'phone' => '+4167614125',
			'picture' => 'image.jpg',
			'description' => 'Bio',
			'email' => 'ulisejavierfernandez@hotmail.es',
			'password' => \Hash::make('2138'),
			'username' => 'ulisejavierfernandez',
			'type' => 'user'
			));

		User::create(array(
			'full_name' => 'Mariana Rojas',
			'phone' => '+58 424 602 9989',
			'picture' => 'image.jpg',
			'description' => 'Bio',
			'email' => 'marianarojasfym@gmail.com',
			'password' => \Hash::make('25061402'),
			'username' => 'marianarojasfym',
			'type' => 'user'
			));

	}

}