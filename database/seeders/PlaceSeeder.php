<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'pasal' => '363 KUHP',
            'waktu' => 'Pada Hari Selasa Tanggal 13 Desember 2022 Sekitar Jam 03.00 WIB',
            'address' => 'Komplek Veteran Blok E/94 Rt.005/007, Ds.Sukamanah, Kec. Rajeg, Kab.Tangerang.',
            'description' => 'Peristiwa Pencurian dengan Pemberatan 1(satu) unit Sepeda Motor Dinas Kawasaki KLX 150, warna Hitam, th. 2016, No. Pol.26030-32, Nosin LX150CEPX0130, Noka. MH4LX150GGJP27744',
            'image' => null,
            'place_rate' => null,
            'latitude' => '-6.1066716004536925',
            'longitude' => '106.5358187152665',
        ]);

        Place::create([
            'pasal' => '363 KUHP',
            'waktu' => 'Pada hari Selasa Tanggal 21 Februari 2023 Sekitar Jam 20.00 WIB',
            'address' => ' Kp. Seglog Rt/Rw. 001/005 Desa Sukamanah Kec.Rajeg Kab.Tangerang',
            'description' => 'Tindak Pidana Pencurian dengan Pemberatan Sepeda Motor Merk Honda No Pol AB-4635-YJ,tahun 2017, Warna Biru Putih, Nomor Rangka MH1JM211HK488851, Nomor Mesin JM21E1485327, An. SUMINEM',
            'image' => null,
            'place_rate' => null,
            'latitude' => '-6.117225955478658',
            'longitude' => '106.51827797649074',
        ]);

        Place::create([
            'pasal' => '363 KUHP',
            'waktu' => 'Pada hari Selasa Tanggal 21 Februari 2023 Sekitar Jam 20.00 WIB',
            'address' => 'Jl.Raya Rajeg Tanjakan no.49 DS.Tanjakan Kec.Rajeg Kab.Tangerang',
            'description' => 'Pencurian dengan Pemberatan 1 (satu) unit sepeda motor Honda Scoopy, warna merah th. 2022, Nopol A 4853 UD, Noka : MH1JM0213NK623827, Nosin : JM02E1623939, An. WAHYUNI',
            'image' => null,
            'place_rate' => null,
            'latitude' => '-6.0924043973461925',
            'longitude' => '106.5186831388329',
        ]);

        Place::create([
            'pasal' => '363 KUHP',
            'waktu' => 'Hari Sabtu, Tanggal 08 April 2023 Sekitar 01.30 WIB',
            'address' => 'Jl. Melati Perum Taman RayaRajeg Blok G Rt. 18/05, Ds. Mekar Sari, Kec. Rajeg, Kab.Tangerang',
            'description' => 'Pencurian dengan Kekerasan berupa 1 ( satu ) buah HP ( HandPhone ) merk. VIVO , Type 1814, warna Biru,.',
            'image' => null,
            'place_rate' => null,
            'latitude' => '-6.122589141030944',
            'longitude' => '106.5345204429125',
        ]);

        Place::create([
            'pasal' => '170 KUHP',
            'waktu' => 'Hari Senin, Tanggal 24 April 2023 Sekitar 02.30 WIB',
            'address' => 'Perum Rajeg Asri Rt.12/02, Ds.Rajeg, , Kec.Rajeg, Kab.Tangerang',
            'description' => 'Peristiwa Pencurian dengan Pemberatan Sepeda Motor',
            'image' => null,
            'place_rate' => null,
            'latitude' => '-6.108642327747815',
            'longitude' => '106.51482157888077',
        ]);
    }
}
