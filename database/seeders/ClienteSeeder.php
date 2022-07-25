<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BsdCliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BsdCliente::create([
            'ruc'  => '20541774450',
            'razon_social'  => 'AD SECURITY S.A.C.',
            'num_celular'  => '',
            'direccion'  => 'AV. LOS ALAMOS MZA. F1 LOTE. 3 URB. CASUARINAS II ETAPA (ESPALDA COLEGIO SR.DE LA VIDA/POLIDEPORT) ANCASH - SANTA - NUEVO CHIMBOTE',
            'departamento'  => 'ANCASH',
            'provincia'  => 'SANTA',
            'distrito'  => 'NUEVO CHIMBOTE',
            'tipo_cliente'  => 'NUEVO',
        ]);

        BsdCliente::create([
            'ruc'  => '20530936041',
            'razon_social'  => 'EMPRESA DE TRANSPORTES Y TURISMO CORVIVAL S.A.C.',
            'num_celular'  => '',
            'direccion'  => 'MZA. P1 LOTE. 1E P.J. EL PORVENIR ANCASH - SANTA - CHIMBOTE',
            'departamento'  => 'ANCASH',
            'provincia'  => 'SANTA',
            'distrito'  => 'CHIMBOTE',
            'tipo_cliente'  => 'NUEVO',
        ]); 

        BsdCliente::create([
            'ruc'  => '20605380175',
            'razon_social'  => 'KAIROS DIGITAL MULTISERVICE E.I.R.L.',
            'num_celular'  => '',
            'direccion'  => 'AV. LOS RUISEÑORES NRO. 465 DPTO. G301 S/N LIMA - LIMA - SANTA ANITA',
            'departamento'  => 'LIMA',
            'provincia'  => 'LIMA',
            'distrito'  => 'SANTA ANITA',
            'tipo_cliente'  => 'NUEVO',
        ]); 

        BsdCliente::create([
            'ruc'  => '20532044147',
            'razon_social'  => 'DISTRIBUIDORA DROGUERIA DISAKY E.I.R.L.',
            'num_celular'  => '',
            'direccion'  => 'MZA. B LOTE. 10 URB. LOS PORTALES (OFICINA 1ER PISO) ANCASH - SANTA - NUEVO CHIMBOTE',
            'departamento'  => 'ANCASH',
            'provincia'  => 'SANTA',
            'distrito'  => 'NUEVO CHIMBOTE',
            'tipo_cliente'  => 'NUEVO',
        ]); 

        BsdCliente::create([
            'ruc'  => '20147264543',
            'razon_social'  => 'DIOCESIS DE CHIMBOTE',
            'num_celular'  => '',
            'direccion'  => 'JR. LADISLAO ESPINAR NRO. 456 URB. CASCO URBANO ANCASH - SANTA - CHIMBOTE',
            'departamento'  => 'ANCASH',
            'provincia'  => 'SANTA',
            'distrito'  => 'CHIMBOTE',
            'tipo_cliente'  => 'NUEVO',
        ]); 

        BsdCliente::create([
            'ruc'  => '20569335494',
            'razon_social'  => 'INVERSIONES TORRES F & F E.I.R.L.',
            'num_celular'  => '',
            'direccion'  => 'JR. ESPINAR NRO. 337 CASCO URBANO ANCASH - SANTA - CHIMBOTE',
            'departamento'  => 'ANCASH',
            'provincia'  => 'SANTA',
            'distrito'  => 'CHIMBOTE',
            'tipo_cliente'  => 'NUEVO',
        ]);

        BsdCliente::create([
            'ruc'  => '20600574401',
            'razon_social'  => 'PREMEZCLADOS KEN S.A.C.',
            'num_celular'  => '',
            'direccion'  => 'CAR.INDUSTRIAL KM. 4 URB. SEMIRUSTICA EL BOSQUE (JUNTO A LA UNIVERSIDAD) LA LIBERTAD - TRUJILLO - TRUJILLO',
            'departamento'  => 'LA LIBERTAD',
            'provincia'  => 'TRUJILLO',
            'distrito'  => 'TRUJILLO',
            'tipo_cliente'  => 'NUEVO',
        ]);

        BsdCliente::create([
            'ruc'  => '20445453901',
            'razon_social'  => 'CHIMU INGENIERIA Y CONSTRUCCIONES S.A.C.',
            'num_celular'  => '',
            'direccion'  => 'CAL.MARTIR JOSE OLAYA NRO. 136 DPTO. 304 INT. P COM. SAN MIGUEL DE MIRAFLORES LIMA - LIMA - MIRAFLORES',
            'departamento'  => 'LIMA',
            'provincia'  => 'LIMA',
            'distrito'  => 'MIRAFLORES',
            'tipo_cliente'  => 'NUEVO',
        ]);

        BsdCliente::create([
            'ruc'  => '10181794572',
            'razon_social'  => 'MORI LORA MELINA ISABEL',
            'num_celular'  => '',
            'direccion'  => '',
            'departamento'  => '',
            'provincia'  => '',
            'distrito'  => '',
            'tipo_cliente'  => 'NUEVO',
        ]);
        
    }
}
