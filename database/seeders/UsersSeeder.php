<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'rol' => 'Administrador',
            'email' => 'Administrador@gmail.com',
            'password' => Hash::make('ADWvfnYGecF99ug'),
            'parroquia_id' =>null,
        ]);

        User::create([
            'name' => 'Catedral de la Medalla Milagrosa',
            'rol' => 'Usuario',
            'email' => 'CatedralMedallaM@gmail.com',
            'password' => Hash::make('qxEfOARtXdgQES2'),
            'parroquia_id' =>1,
        ]);

        User::create([
            'name' => 'Parroquia Cristo Redentor',
            'rol' => 'Usuario',
            'email' => 'PCristoRedentor@gmail.com',
            'password' => Hash::make('CCVYTNCX.77'),
            'parroquia_id' =>2,
        ]);

        User::create([
            'name' => 'Parroquia de Nuestra Señora de Guadalupe',
            'rol' => 'Usuario',
            'email' => 'PNuestraSG@gmail.com',
            'password' => Hash::make('kMn0yfR1yBUBuhE'),
            'parroquia_id' =>3,
        ]);

        User::create([
            'name' => 'Parroquia Santa Cruz',
            'rol' => 'Usuario',
            'email' => 'PSantaCruz@gmail.com',
            'password' => Hash::make('jHSGEcNnN9DtzlF'),
            'parroquia_id' =>4,
        ]);

        User::create([
            'name' => 'Parroquia Resurección de Cristo',
            'rol' => 'Usuario',
            'email' => 'PResureccionC@gmail.com',
            'password' => Hash::make('HaNhDwWAFjQDY9h'),
            'parroquia_id' =>5,
        ]);

        User::create([
            'name' => 'Parroquia San Antonio de Padua',
            'rol' => 'Usuario',
            'email' => 'PSAntonioP@gmail.com',
            'password' => Hash::make('ew0hLzvPs2bGUu0'),
            'parroquia_id' =>6,
        ]);

        User::create([
            'name' => 'Parroquia San Judas Tadeo',
            'rol' => 'Usuario',
            'email' => 'PSanJudasT@gmail.com',
            'password' => Hash::make('wSuRGhQYH9fw3ii'),
            'parroquia_id' =>7,
        ]);

        User::create([
            'name' => 'Parroquia Sagrado Corazon de Jesús',
            'rol' => 'Usuario',
            'email' => 'PSCorazonJ@gmail.com',
            'password' => Hash::make('sZO82NgyGu6IJuK'),
            'parroquia_id' =>8,
        ]);

        User::create([
            'name' => 'Parroquia Santo Niño de Atocha',
            'rol' => 'Usuario',
            'email' => 'PSNAtocha@gmail.com',
            'password' => Hash::make('Em81vuaqfzvCNZX'),
            'parroquia_id' =>9,
        ]);

        User::create([
            'name' => 'Parroquia de María Madre',
            'rol' => 'Usuario',
            'email' => 'PMariaMadre@gmail.com',
            'password' => Hash::make('2eeg8FaUv0T6kUj'),
            'parroquia_id' =>10,
        ]);

        User::create([
            'name' => 'Parroquia San José',
            'rol' => 'Usuario',
            'email' => 'PSanJose@gmail.com',
            'password' => Hash::make('n6K3s2hyZC0sNjc'),
            'parroquia_id' =>11,
        ]);

        User::create([
            'name' => 'Parroquia Nuestra Señora de Guadalupe (Casas Grandes)',
            'rol' => 'Usuario',
            'email' => 'PNSGuadalupe@gmail.com',
            'password' => Hash::make('CoaN7J0ubUdWt5L'),
            'parroquia_id' =>12,
        ]);

        User::create([
            'name' => 'Rectoria Corpus Christi',
            'rol' => 'Usuario',
            'email' => 'RCorpusC@gmail.com',
            'password' => Hash::make('CgjQfx5pqxSZJJE'),
            'parroquia_id' =>13,
        ]);

        User::create([
            'name' => 'Parroquia Nuestra Señora de los Dolores',
            'rol' => 'Usuario',
            'email' => 'PNSDolores@gmail.com',
            'password' => Hash::make('yU9oJtF0UY0pTAt'),
            'parroquia_id' =>14,
        ]);

        User::create([
            'name' => 'Parroquia Ascención del Señor',
            'rol' => 'Usuario',
            'email' => 'PASenor@gmail.com',
            'password' => Hash::make('Rj3d9rdpFEQez6P'),
            'parroquia_id' =>15,
        ]);

        User::create([
            'name' => 'Parroquia Nuestra Señora de Guadalupe (Ascención)',
            'rol' => 'Usuario',
            'email' => 'PNSGuadalupeA@gmail.com',
            'password' => Hash::make('QCDrQuTEXSjpcKf'),
            'parroquia_id' =>16,
        ]);

        User::create([
            'name' => 'Parroquia Sagrado Corazon de Jesús (Janos)',
            'rol' => 'Usuario',
            'email' => 'PSCJesusJ@gmail.com',
            'password' => Hash::make('YrD8cxfnTFKmJK4'),
            'parroquia_id' =>17,
        ]);

        User::create([
            'name' => 'Parroquia San Buenaventura',
            'rol' => 'Usuario',
            'email' => 'PSanBuenaventura@gmail.com',
            'password' => Hash::make('SIiyrjH1zgMU4vE'),
            'parroquia_id' =>18,
        ]);

        User::create([
            'name' => 'Nuestra Señora de Fátima',
            'rol' => 'Usuario',
            'email' => 'PNSeñoraFatima@gmail.com',
            'password' => Hash::make('SIiyrjH1zgMU4vE'),
            'parroquia_id' =>19,
        ]);

        User::create([
            'name' => 'Parroquia Inmaculada Concepción',
            'rol' => 'Usuario',
            'email' => 'PInmaculadaC@gmail.com',
            'password' => Hash::make('JYeDAlCbyGEj6AX'),
            'parroquia_id' =>20,
        ]);

        User::create([
            'name' => 'Parroquia San Isidro Labrador',
            'rol' => 'Usuario',
            'email' => 'PSanIsidroL@gmail.com',
            'password' => Hash::make('TuVJeiWLYdsd4OD'),
            'parroquia_id' =>21,
        ]);

        User::create([
            'name' => 'Parroquia Nuestra Señora del Carmen',
            'rol' => 'Usuario',
            'email' => 'PNSenoraCarmen@gmail.com',
            'password' => Hash::make('ALh4MlY8vyF1Z1o'),
            'parroquia_id' =>22,
        ]);

        User::create([
            'name' => 'Parroquia Cristo Rey',
            'rol' => 'Usuario',
            'email' => 'PCristoRey@gmail.com',
            'password' => Hash::make('GxpNBIRcn05R26I'),
            'parroquia_id' =>23,
        ]);

        User::create([
            'name' => 'Rectoria Cristo Rey',
            'rol' => 'Usuario',
            'email' => 'RCristoRey@gmail.com',
            'password' => Hash::make('RJMOjSXaNsA9apT'),
            'parroquia_id' =>24,
        ]);

        User::create([
            'name' => 'Parroquia Natividad de María',
            'rol' => 'Usuario',
            'email' => 'PNatividadMaria@gmail.com',
            'password' => Hash::make('gkrErf1UyLg5M9h'),
            'parroquia_id' =>25,
        ]);
    }
}
