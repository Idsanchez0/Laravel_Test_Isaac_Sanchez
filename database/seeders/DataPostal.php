<?php

namespace Database\Seeders;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\PostalService;
use App\Models\Settlement;
use App\Models\SettlementType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class DataPostal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $type=SettlementType::create(
            [
                'name' => 'Pueblo',
            ]
        );
        
        $serv_postal=PostalService::create([
            'zip_code' =>'01210',
            'locality'=>'CIUDAD DE MEXICO'
        ]);

        FederalEntity::create([
            'name' =>'CIUDAD DE MEXICO',
            'code'=>'4555',
            'postal_service_id' => $serv_postal->id,
        ]);

        Settlement::create([
            'name' =>'SANTA FE',
            'zone_type'=>'URBANO',
            'postal_service_id' => $serv_postal->id,
            'type_id' => $type->id,
        ]);

        Municipality::create([
            'name' =>'ALVARO OBREGON',
            'postal_service_id' => $serv_postal->id,
            
        ]);
       

       
    }
}
