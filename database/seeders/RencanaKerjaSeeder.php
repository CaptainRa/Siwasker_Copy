<?php

namespace Database\Seeders;

use App\Models\RencanaKerja;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RencanaKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totok = [
            'PT Mas Arya Indonesia',
            'Perusahaan Tahu Sederhana CK',
            'PT. Roda Maju Bahagia',
            'PT Inizio',
            'SPBU 44.513.11',
            'PT. Canmax Bags Indonesia',
            'Hotel Sae Inn Kendal',
            'PT. Dae Young Textile',
            'PT. D&V Medika',
            'PT. Sasakura Indonesia',
            'PT. Golden Tekstil Indonesia',
            'PT. Adventa Biotech International',
            'RS PKU Aisyiyah Kendal',
            'PT. Asia Pangan Utama',
            'PT Pionir Beton Industri',
            'PT. Mandalatama Armada Motor',
            'PT. Nusantara Laju Bersama',
            'PT. Linkfortune',
            'PT. Kendal Bangun Cipta Sarana',
            'SPBU 44.513.03',
            'PT Samator Gas (Indogas Raya Utama)',
            'Kospin Sekartama',
            'PT. Cahaya Maju Bahagia',
            'SPBU 44.513.16',
            'PT. Kencana Sukses Gemilang',
            'PT. Sari Tembakau Harum',
            'PT Eclat Textile International',
            'PT. Wira Pangan Indonesia',
            'PT. Trina Mas Agra Indonesia',
            'Swalayan Aneka Jaya Kendal (PT Aneka Jaya Ritelindo)',
            'PT Royal Regent Indonesia',
            'PT Tasindo Dharma Industri',
            'PT. Sumber Sentosa Makmur Polimer',
            'PT Texmaco Perkasa Engineering',
            'PT. Mahakarya Inti Cipta',
            'PT. Polaris Uno Indonesia',
            'Dealer Daihatsu Kendal',
            'PT. Longhi Technology Indonesia',
            'SPBU 44.513.07',
            'PT. Sinar Harapan Plastik'
        ];

        foreach($totok as $each){
            RencanaKerja::create([
                'nip' => '198403262010011018',
                'nama_perusahaan' => $each,
                'tanggal_pelaksanaan' => Carbon::parse('2025-03-02'),
                'keterangan' => 'Lorem Ipsum dolor sit amet consectetur adipisicing elit'
            ]);
        }
    }
}
