<?php

namespace Database\Seeders;

use App\Models\Kasat;
use App\Models\Pengawas;
use App\Models\Role;
use App\Models\TU;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengawas = [
            ['nip' => '197104011998032007', 'nama' => "Chusnun Ni'mah, SE, MM", 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Madya', 'pangkat' => 'Pembina Tk. I', 'golongan' => 'IV/b', 'role'=>'pengawas'],
            ['nip' => '196712161991031008', 'nama' => 'Santoso , S.KM', 'jabatan' => 'Pengawas Ketenagakerjaan Madya', 'pangkat' => 'Pembina Tk. I', 'golongan' => 'IV/b', 'role'=>'pengawas'],
            ['nip' => '196712101991032011', 'nama' => 'Ratna Saryawati, S.KM, M.Kes', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Madya', 'pangkat' => 'Pembina Tk. I', 'golongan' => 'IV/b', 'role'=>'pengawas'],
            ['nip' => '196606121992031006', 'nama' => 'Isbandi Hadimulyanto, S.Sos., M.H.', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Madya', 'pangkat' => 'Pembina', 'golongan' => 'IV/a', 'role'=>'pengawas'],
            ['nip' => '196512231998032005', 'nama' => 'Natalia Murhayanti, S.KM', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Madya', 'pangkat' => 'Pembina', 'golongan' => 'IV/a', 'role'=>'pengawas'],
            ['nip' => '196905241991032003', 'nama' => 'Nina Kusuma Wardani, SH', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Madya', 'pangkat' => 'Pembina', 'golongan' => 'IV/a', 'role'=>'pengawas'],
            ['nip' => '197101261993032003', 'nama' => 'Yuyun Setyowati', 'jabatan' => 'Pengawas Ketenagakerjaan Penyelia', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '197603132010012007', 'nama' => 'Yustrini Komaratih Mauliena, ST, M.M', 'jabatan' => 'Pengawas Ketenagakerjaan Madya', 'pangkat' => 'Pembina', 'golongan' => 'IV/a', 'role'=>'pengawas'],
            ['nip' => '197609032010011008', 'nama' => 'Jamaludin Al Ashari, SH, MH', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Madya', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '197805022009032007', 'nama' => 'Ponti Anggreani, SH', 'jabatan' => 'Pengawas Ketenagakerjaan Madya', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '197608272009031001', 'nama' => 'Ahmad Romdhoni, ST', 'jabatan' => 'Pengawas Ketenagakerjaan Madya', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '198403262010011018', 'nama' => 'Totok Rochmat Trijoko, ST', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '198610142010012026', 'nama' => 'Sekar Tresna Raras Tywi, SH, MH', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '197905032011012003', 'nama' => 'Gresa Sekardatun, SH, MH', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '197410262009021002', 'nama' => 'Agus Sapto Nugroho, S.T', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'pengawas'],
            ['nip' => '198012222010011010', 'nama' => 'Hari Iswanto, ST', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata', 'golongan' => 'III/c', 'role'=>'pengawas'],
            ['nip' => '198802212010012011', 'nama' => 'Dian Reswari Putri Sihombing, ST', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Pertama', 'pangkat' => 'Penata Muda Tk. I', 'golongan' => 'III/b', 'role'=>'pengawas'],
            ['nip' => '199004212014022002', 'nama' => 'Arini Dwi Hapsari, SH', 'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata', 'golongan' => 'III/c', 'role'=>'pengawas'],
        ];

        foreach($pengawas as $each){
            $name = $each['nama'];
            $ArrName = explode(' ', $name);
            $firstName = strtolower($ArrName[0]);
            $email = $firstName . '@siwasker.com';
            $nip = $each['nip'];

            User::create([
                'nip' => $nip,
                'name' => $name,
                'email' => $email,
                'role' => $each['role'],
                'jenis_kelamin' => ($nip[14] == '1') ? 'Laki-Laki' : 'Perempuan',
                'jabatan' => $each['jabatan'],
                'pangkat' => $each['pangkat'],
                'golongan' => $each['golongan'],
                'password' => bcrypt($firstName . '123')
            ]);
            
            Pengawas::create([
                'nip' => $each['nip'],
                'nama' => $name,
            ]);

            $rolePengawas = Role::where('name', 'pengawas')->first();
            User::where('email', $email)->first()->roles()->attach($rolePengawas->id);
        }

        User::create(['nip' => '', 'name' => '', 'jabatan' => '', 'pangkat' => '', 'golongan' => '', 'role'=>'pengawas']);
        Pengawas::create(['nip' => '', 'nama' => '']);

        $tu = [
            ['nip' => '199411182019022007', 'nama' => 'Musyahida Azmy Alfatsani, S.T.',  'jabatan' => 'Pengawas Ketenagakerjaan Ahli Muda', 'pangkat' => 'Penata Muda Tk. I', 'golongan' => 'III/c', 'role'=>'tu'],
            ['nip' => '196705232007011007', 'nama' => 'Dadang Edy Rusmiantoro',  'jabatan' => 'Pengelola Sarana Prasarana Rumah Tangga Dinas', 'pangkat' => 'Pengatur Tk. I', 'golongan' => 'II/d', 'role'=>'tu'],
            ['nip' => '199704262022032012', 'nama' => 'Adinda Aqmarina Sabila, S. Tr. T',  'jabatan' => 'Pengawas Ketenagakerjaan Ahli Pertama', 'pangkat' => 'Penata Muda', 'golongan' => 'III/a', 'role'=>'tu']
        ];

        foreach($tu as $each){
            $name = $each['nama'];
            $ArrName = explode(' ', $name);
            $firstName = strtolower($ArrName[0]);
            $email = $firstName . '@siwasker.com';
            $nip = $each['nip'];
            
            User::create([
                'nip' => $nip,
                'name' => $name,
                'email' => $email,
                'role' => $each['role'],
                'jenis_kelamin' => ($nip[14] == '1') ? 'Laki-Laki' : 'Perempuan',
                'jabatan' => $each['jabatan'],
                'pangkat' => $each['pangkat'],
                'golongan' => $each['golongan'],
                'password' => bcrypt($firstName . '123')
            ]);

            TU::create([
                'nip' => $each['nip'],
                'nama' => $name,
            ]);

            $roleTU = Role::where('name', 'tu')->first();
            User::where('email', $email)->first()->roles()->attach($roleTU->id);
        }

        $kasat = ['nip' => '198508062009032005', 'nama' => 'Linnia Nughaharetha, ST, M.Si',  'jabatan' => 'KASUBBAG Tata Usaha', 'pangkat' => 'Penata Tk. I', 'golongan' => 'III/d', 'role'=>'kasat'];
        $arrNameKasat = explode(' ', $kasat['nama']);
        $name = strtolower($arrNameKasat[0]);
        $nip = $kasat['nip'];

        User::create(
            ['nip' => '198508062009032005',
             'name' => 'Linnia Nughaharetha, ST, M.Si',
             'email' => $name . '@siwasker.com',
             'role' => $kasat['role'],
             'jenis_kelamin' => ($nip[14] == '1') ? 'Laki-Laki' : 'Perempuan',
             'jabatan' => 'KASUBBAG Tata Usaha',
             'pangkat' => 'Penata Tk. I',
             'golongan' => 'III/d',
             'password' => bcrypt($name . '123')
        ]);

        Kasat::create(['nip' => $nip, 'nama' => $kasat['nama']]);

        $roleKasat = Role::where('name', 'kasat')->first();
        User::where('email', $arrNameKasat[0] . '@siwasker.com')->first()->roles()->attach($roleKasat->id);

    } 
}
