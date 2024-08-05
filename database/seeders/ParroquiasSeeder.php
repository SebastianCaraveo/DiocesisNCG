<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parroquia;

class ParroquiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        Parroquia::create([
        'nombre' => 'Catedral de la Medalla Milagrosa',
        'direccion' => 'Calle 5 de Mayo y Benito Juárez s/n Apdo. Postal No. 145, 31700',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d723.3192659920215!2d-107.91483423191933!3d30.416091570143717!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcac5628e66e1b%3A0xcfd21ba8c613dc54!2sCatedral%20de%20Nuestra%20Se%C3%B1ora%20de%20la%20Medalla%20Milagrosa!5e0!3m2!1ses-419!2smx!4v1685483503811!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366940552',
        'horario' => 'Lunes a viernes de 9:00 a 13:00 hrs y de 16:00 a 19:00 hrs. Sábados de 9:00 a 13:00 hrs',
        'id_parroco' => null,
        ]);//1

        Parroquia::create([
        'nombre' => 'Parroquia Cristo Redentor',
        'direccion' => 'Calle Libertad y Jesús García No. 2501 Col. Obrera, Apdo. Postal No. 44, 31750',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.20599424209!2d-107.90992592379563!3d30.401896901545317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcace241c06407%3A0x338007332bc0e091!2sParroquia%20Cristo%20Redentor!5e0!3m2!1ses-419!2smx!4v1685483633540!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366942680',
        'horario' => 'Lunes a viernes de 10:00 a 13:00 y de 16:00 a 19:00',
        'id_parroco' => null,
        ]);//2

        
        Parroquia::create([
        'nombre' => 'Parroquia de Nuestra Señora de Guadalupe',
        'direccion' => 'Calle Mina y Callejón 19 Apdo. postal 212 Col. San Isidro, 31730',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d723.2293168600883!2d-107.92172354855488!3d30.428225970770626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcac44f4389179%3A0xbaa33c890a09c4f!2sSantuario%20De%20Nuestra%20Se%C3%B1ora%20Virgen%20De%20Guadalupe!5e0!3m2!1ses-419!2smx!4v1685483612683!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6365513465',
        'horario' => 'Lunes a viernes de 10:00 a 13:00 y de 16:00 a 18:00, lunes sin segundo horario',
        'id_parroco' => null,
        ]);//3

        Parroquia::create([
        'nombre' => 'Parroquia la Santa Cruz',
        'direccion' => 'Calle Octavio Paz (7ª) y Constitución s/n Col. Dublán Apdo. Postal No. 321, 31710',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3439.740907627707!2d-107.91536732379446!3d30.443445899554906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcac36c62cd0a7%3A0xf65a788bb64922e4!2sIglesia%20la%20Santa%20Cruz!5e0!3m2!1ses-419!2smx!4v1685483885147!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366941726',
        'horario' => 'Lunes a viernes de 9:00 a 13:00 hrs y de 15:00 a 17:00 hrs. Sábados de 9:30 a 13:00 hrs',
        'id_parroco' => null,
        ]);//4
        
        Parroquia::create([
        'nombre' => 'Parroquia la Resurección de Cristo',
        'direccion' => 'Calle Ejido Casas Grandes 2004 Colonia Acción Popular, Apdo. postal No. 19 31778',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13765.02883906138!2d-107.89752576117796!3d30.40044353046974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcad161e5e718d%3A0xea21bf9bb2997510!2sParroquia%20de%20la%20Resurrecci%C3%B3n%20de%20Cristo!5e0!3m2!1ses-419!2smx!4v1685483976507!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366946719',
        'horario' => 'Lunes a sábado de 10:00 a 13:00 y de 16:00 a 18:00',
        'id_parroco' => null,
        ]);//5
        
        Parroquia::create([
        'nombre' => 'Parroquia San Antonio de Padua',
        'direccion' => 'Calle Plaza de la Constitución No. 48 31850',
        'municipio' => 'Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.1543217282037!2d-107.95019603594342!3d30.374975492104983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcaca8bf67ce35%3A0x4bcdb197888346a!2sTemplo%20De%20San%20Antonio%20de%20Padua!5e0!3m2!1ses-419!2smx!4v1685484164683!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366924010',
        'horario' => 'Lunes a viernes de 10:00 a 13:00 y de 16:00 a 18:00',
        'id_parroco' => null,
        ]);//6
        
        Parroquia::create([
        'nombre' => 'Parroquia San Judas Tadeo',
        'direccion' => 'Calle Álamos y Sicomoro No. 4530  Col. Juan José Salas (antes CROC) 31789',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.1405642136197!2d-107.878800383333!3d30.386951517712394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcad480544d3c9%3A0xdfd2eaea421059d!2sCuasi%20Parroquia%20San%20Judas%20Tadeo!5e0!3m2!1ses-419!2smx!4v1685484010539!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366902237',
        'horario' => 'Martes a sábado de 16:00 a 19:00',
        'id_parroco' => null,
        ]);//7

        Parroquia::create([
        'nombre' => 'Parroquia Sagrado Corazón de Jesús',
        'direccion' => 'Calle Paseo de la Reforma No. 1720 Col. Héroes de la Reforma, 31777',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.0073077207585!2d-107.88180111868361!3d30.407534543673343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcad12e3620e0f%3A0xbde0b600f6a5d97f!2sParroquia%20del%20Sagrado%20Corazon%20de%20Jesus!5e0!3m2!1ses-419!2smx!4v1685484034428!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366947507',
        'horario' => 'Lunes a sábado de 9:00 a 13:00 hrs',
        'id_parroco' => null,
        ]);//8

        Parroquia::create([
        'nombre' => 'Parroquia Santo Niño de Atocha',
        'direccion' => 'Calle Benito Juarez Col. Tres Alamos, 31844',
        'municipio' => 'Janos, Chih.',
        'ubicacion' => '<iframe src="https://maps.app.goo.gl/Bp9pm6J6gzKXzrU18" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => 'Pendiente',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//9

        Parroquia::create([
        'nombre' => 'Parroquia de María Madre',
        'direccion' => 'Calle Vicente Guerrero No. 501 Apdo. postal 435, 31700',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2433.1597810077155!2d-107.91480027496341!3d30.407527337107837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcacfa8d5faac5%3A0xcf9a60736a2e4e3!2sParroquia%20Mar%C3%ADa%20Madre%20de%20la%20Iglesia!5e0!3m2!1ses-419!2smx!4v1685484071364!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366942033 ',
        'horario' => 'Lunes a sábado de 9:00 a 13:00 hrs y de 15:00 a 18:00. Sábados de 9:00 a 13:00 hrs',
        'id_parroco' => null,
        ]);//10
        
        Parroquia::create([
        'nombre' => 'Parroquia San José',
        'direccion' => 'Juan Mata Ortíz 31861',
        'municipio' => 'Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d711606.0654258431!2d-108.83498798610997!3d30.18519925274955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c357875607b5dd%3A0xa486c166aca959a9!2sParroquia%20San%20Jos%C3%A9!5e1!3m2!1ses-419!2smx!4v1701323778004!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366617147',
        'horario' => 'Lunes, miércoles y viernes de 10:00 a 13:00 y de 16:00 a 19:00',
        'id_parroco' => null,
        ]);//11
        
        Parroquia::create([
        'nombre' => 'Parroquia Nuestra Señora de Guadalupe',
        'direccion' => 'Calle Anáhuac No.38 Colonia Juárez 31857',
        'municipio' => 'Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d710703.4265130445!2d-108.76305815043798!3d30.309911842852667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c4ab69d5785b11%3A0xf45dc1e93a0475b9!2sParroquia%20Nuestra%20Se%C3%B1ora%20de%20Guadalupe!5e1!3m2!1ses-419!2smx!4v1701324002445!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366950197',
        'horario' => 'Jueves de 10:00 a 17:00',
        'id_parroco' => null,
        ]);//12
        
        Parroquia::create([
        'nombre' => 'Rectoría Corpus Christi',
        'direccion' => 'Calle Laguna los Mexicanos No.1001 Colonia Luis Donaldo Colosio 31758',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.5626027119097!2d-107.90103156438263!3d30.391775922021264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcad18cdece15d%3A0x64b9fd8cb0af8991!2sRectoria%20Corpus%20Christi!5e0!3m2!1ses-419!2smx!4v1685484105580!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => 'Pendiente',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//13
        
        Parroquia::create([
        'nombre' => 'Parroquia Nuestra Señora de los Dolores',
        'direccion' => 'Calle Vicente Guerrero s/n Apdo. Postal  No.8 31849',
        'municipio' => 'Janos, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2759.620008192012!2d-108.1936339255046!3d30.889726478030294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86db7ae03acda0b3%3A0xd905d1a13c8a322c!2sPARROQUIA%20NUESTRA%20SE%C3%91ORA%20DE%20LOS%20DOLORES!5e1!3m2!1ses-419!2smx!4v1701324353292!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366935098',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//14
        
        Parroquia::create([
        'nombre' => 'Parroquia la Ascención del Señor',
        'direccion' => 'Calle Allende 145 Apdo. Postal No.34 31820',
        'municipio' => 'Ascención, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d704960.4892827056!2d-109.15122985839845!3d31.092779107947155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dc7e3581c4e79f%3A0xe27733ef18cd1c18!2sAscensi%C3%B3n%20del%20Se%C3%B1or%20Catholic%20Church!5e1!3m2!1ses-419!2smx!4v1701324552372!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366920035 y 6366921188',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//15
        
        Parroquia::create([
        'nombre' => 'Parroquia Nuestra Señora de Guadalupe',
        'direccion' => 'Calle Abasolo No.2012 31820',
        'municipio' => 'Ascención, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d701660.8304106612!2d-108.89219284057617!3d31.534652412605492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dc143def43d87b%3A0x1914204ad31e4648!2sParroquia%20Nuestra%20Se%C3%B1ora%20de%20F%C3%A1tima!5e1!3m2!1ses-419!2smx!4v1701324736830!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366921886 y 6366920281',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//16

        Parroquia::create([
        'nombre' => 'Parroquia Sagrado Corazón de Jesús',
        'direccion' => 'Calle Revolución s/n Apdo. Postal  No.19 31845 Ejido Monte Verde',
        'municipio' => 'Janos, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d706294.4235216156!2d-109.8684310913086!3d30.912534672481808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86db012d056ce0b9%3A0xbbc46955807bfb6c!2sParroquia%20del%20Sagrado%20Coraz%C3%B3n%20de%20Jes%C3%BAs!5e1!3m2!1ses-419!2smx!4v1701324961480!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366954019',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//17

        Parroquia::create([
        'nombre' => 'Parroquia San Buenaventura',
        'direccion' => 'Calle Obregón e Hidalgo s/n 31890',
        'municipio' => 'Buenaventura, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3460.7349762465824!2d-107.47526332555174!3d29.84307072808571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c3058432e19e69%3A0x6a6834d4e072015a!2sSan%20BUENAVENTURA!5e0!3m2!1ses-419!2smx!4v1701325483752!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6960090 y 6960121',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//18

        Parroquia::create([
        'nombre' => 'Parroquia Nuestra Señora de Fátima',
        'direccion' => 'Calle Guadalupe Victoria s/n Col. Guadalupe Victoria 31831',
        'municipio' => 'Ascención, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1370.4341552109772!2d-107.73999170576995!3d31.53445851853422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dc143def43d87b%3A0x1914204ad31e4648!2sParroquia%20Nuestra%20Se%C3%B1ora%20de%20F%C3%A1tima!5e1!3m2!1ses-419!2smx!4v1701325358164!5m2!1ses-419!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6566974005',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//19
        

        Parroquia::create([
        'nombre' => 'Parroquia Inmaculada Concepción',
        'direccion' => 'Juan Mata Ortiz y Colón #424 31870',
        'municipio' => 'Galeana, Chih.',
        'ubicacion' => 'Pendiente',
        'telefono' => 'Pendiente',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//20
        
        Parroquia::create([
        'nombre' => 'Parroquia San Isidro Labrador',
        'direccion' => 'Abdenago C. García, Chih. (Lagunitas) 31870',
        'municipio' => 'Galeana, Chih.',
        'ubicacion' => 'Pendiente',
        'telefono' => '6366930248',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//21

        Parroquia::create([
        'nombre' => 'Parroquia Nuestra Señora del Carmen',
        'direccion' => 'Calle Hidalgo y División del Norte Ricardo Flores Magón 31880',
        'municipio' => 'Buenaventura, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1728.6149322063984!2d-106.9655759410758!3d29.944066165997338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c2f3af29660641%3A0x9fa6a9596b8c29fb!2sNuestra%20se%C3%B1ora%20del%20carmen!5e0!3m2!1ses-419!2smx!4v1701326556392!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366970030',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//22

        Parroquia::create([
        'nombre' => 'Parroquia Cristo Rey',
        'direccion' => 'Calle Emiliano Zapata y Benito Juarez s/n Ejido Benito Juarez 31884',
        'municipio' => 'Buenaventura, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4740.208478671985!2d-106.89047052259177!3d30.14999345065433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86c29561149f6cff%3A0x9e094225e41e773e!2sParroquia%20Cristo%20Rey!5e0!3m2!1ses-419!2smx!4v1701326646769!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366980020',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//23

        Parroquia::create([
        'nombre' => 'Rectoría Cristo Rey',
        'direccion' => 'Ave. Solidaridad y Calle Eugenio Prado Colonia Quevedo 31891',
        'municipio' => 'Buenaventura, Chih.',
        'ubicacion' => 'Pendiente',
        'telefono' => '636 130-3497',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//24

        Parroquia::create([
        'nombre' => 'Natividad de María',
        'direccion' => 'Calle Emilio Carranza e Independencia #2403 Col. Villahermosa 31770',
        'municipio' => 'Nuevo Casas Grandes, Chih.',
        'ubicacion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1022.989198685116!2d-107.8922901596711!3d30.41024419463505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86dcad0fa13a080d%3A0xdcc8cd49a4ab35fc!2sIndependencia%2023%2C%2031770%20Nuevo%20Casas%20Grandes%2C%20Chih.!5e0!3m2!1ses!2smx!4v1708760737415!5m2!1ses!2smx" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'telefono' => '6366942562',
        'horario' => 'Pendiente',
        'id_parroco' => null,
        ]);//25

    }
}
