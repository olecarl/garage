<?php

namespace App\Enum;

enum VehicleBrands: string
{
    case alfa_romeo = 'Alfa Romeo';
    case alpine = 'Alpine';
    case aston_martin = 'Aston Martin';
    case audi = 'Audi';
    case baic = 'BAIC';
    case bmw = 'BMW';
    case bentley = 'Bentley';
    case borgward = 'Borgward';
    case buick = 'Buick';
    case byd = 'BYD';
    case cadillac = 'Cadillac';
    case chery = 'Chery';
    case chevrolet = 'Chevrolet';
    case chrysler = 'Chrysler';
    case citroen = 'Citroën';
    case cupra = 'Cupra';
    case dacia = 'Dacia';
    case daewoo = 'Daewoo';
    case dodge = 'Dodge';
    case ds = 'DS Automobiles';
    case elroq = 'Elroq';
    case ferrari = 'Ferrari';
    case fiat = 'Fiat';
    case ford = 'Ford';
    case geely = 'Geely';
    case genesis = 'Genesis';
    case gmc = 'GMC';
    case great_wall = 'Great Wall';
    case honda = 'Honda';
    case hongqi = 'Hongqi';
    case hummer = 'Hummer';
    case hyundai = 'Hyundai';
    case infiniti = 'Infiniti';
    case isuzu = 'Isuzu';
    case jac = 'JAC';
    case jaguar = 'Jaguar';
    case jeep = 'Jeep';
    case kia = 'Kia';
    case lamborghini = 'Lamborghini';
    case lancia = 'Lancia';
    case land_rover = 'Land Rover';
    case lexus = 'Lexus';
    case lincoln = 'Lincoln';
    case lotus = 'Lotus';
    case lucid = 'Lucid';
    case lynk_co = 'Lynk & Co';
    case mahindra = 'Mahindra';
    case maserati = 'Maserati';
    case maybach = 'Maybach';
    case mazda = 'Mazda';
    case mclaren = 'McLaren';
    case mercedes_benz = 'Mercedes Benz';
    case mg = 'MG';
    case mini = 'MINI';
    case mitsubishi = 'Mitsubishi';
    case nissan = 'Nissan';
    case opel = 'Opel';
    case pagani = 'Pagani';
    case peugeot = 'Peugeot';
    case polestar = 'Polestar';
    case porsche = 'Porsche';
    case range_rover = 'Range Rover';
    case renault = 'Renault';
    case rolls_royce = 'Rolls-Royce';
    case saab = 'Saab';
    case seat = 'SEAT';
    case skoda = 'Škoda';
    case smart = 'smart';
    case ssangyong = 'SsangYong';
    case subaru = 'Subaru';
    case suzuki = 'Suzuki';
    case tata = 'Tata';
    case tesla = 'Tesla';
    case toyota = 'Toyota';
    case vauxhall = 'Vauxhall';
    case volkswagen = 'Volkswagen';
    case volvo = 'Volvo';

    /**
     * @return string[]
     */
    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
