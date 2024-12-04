<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facker = Faker::create();
        $users = User::all();

        $acudits = [
            [
                'title' => "Aquest acudit musical et deixarà sense paraules!",
                'content' => "Per què els músics sempre es perden? Perquè estan buscant el to!"
            ],
            [
                'title' => "El vampir que va revolucionar l'agricultura!",
                'content' => "Què fa un vampir en un tractor? Agricultura de sang!"
            ],
            [
                'title' => "Aquest peix amb talent et farà riure!",
                'content' => "Saps com es diu un peix que sona? Un dofí silenciador!"
            ],
            [
                'title' => "El misteri dels gats seriosos... resolt!",
                'content' => "Per què els gats no expliquen acudits? Perquè són massa seriosos per riure!"
            ],
            [
                'title' => "No creuràs el truc màgic d'aquest gos!",
                'content' => "Com es diu un gos mag que fa trucs? Un dog-ma!"
            ],
            [
                'title' => "Quin és l'ocell més fort? La resposta et sorprendrà!",
                'content' => "Quin és l’ocell més fort? L’ocell de ferro, perquè pesa una tona!"
            ],
            [
                'title' => "Aquest tomàquet no juga a cartes, i aquí tens el motiu!",
                'content' => "Per què els tomàquets mai juguen a cartes? Perquè no volen fer salsa!"
            ],
            [
                'title' => "Un pingüí al gimnàs? Descobreix el seu secret!",
                'content' => "Com li dius a un pingüí que surt a fer exercici? Un 'run-guí'!"
            ],
            [
                'title' => "El pollastre més feliç del prat!",
                'content' => "Què diu un pollastre que es diverteix molt? 'Que guai, quina ploma!'"
            ],
            [
                'title' => "L'ànec que domina la pista de ball!",
                'content' => "Què fa un ànec a la discoteca? 'Duck-step'!"
            ],
            [
                'title' => "Els llibres aquàtics existeixen?",
                'content' => "Què passa si tires un llibre al riu? Que es converteix en una novel·la aquàtica!"
            ],
            [
                'title' => "El cocodril més educat de la selva!",
                'content' => "Quin és l’animal més educat? El cocodril, perquè sempre saluda amb 'croc'!"
            ],
            [
                'title' => "Aquest cuc ballarí és un fenomen!",
                'content' => "Com es diu un cuc que sap ballar? Un cucba!"
            ],
            [
                'title' => "El professor enfadat per culpa del piano!",
                'content' => "Per què el professor de música es va enfadar? Perquè el piano estava desafinat!"
            ],
            [
                'title' => "Un vaixell que xiula? Això sí que és curiós!",
                'content' => "Com fa un vaixell que està content? Va xiulant!"
            ],
            [
                'title' => "La veritat darrere dels ordinadors i el cafè!",
                'content' => "Per què els ordinadors no prenen cafè? Perquè ja tenen moltes instruccions!"
            ],
            [
                'title' => "No tornis a veure una taronja igual mai més!",
                'content' => "Quin és el fruit que sempre està cansat? La taronja, perquè s’esprem massa!"
            ],
            [
                'title' => "Els esquelets i el misteri del rellotge!",
                'content' => "Per què els esquelets mai porten rellotge? Perquè el temps els passa pels ossos!"
            ],
            [
                'title' => "Aquest ós es vesteix millor que tu!",
                'content' => "Com es diu un ós que es vesteix elegant? Un ósmoda!"
            ],
            [
                'title' => "Un cangur amb talent inesperat!",
                'content' => "Què fa un cangur boxejador? Saltar a l’arena!"
            ],
            [
                'title' => "El secret que els peixos no volen que sàpigues!",
                'content' => "Per què els peixos no van a l’escola? Perquè ja viuen en el corrent!"
            ],
            [
                'title' => "Els vampirs tenen un lloc preferit, i és aquest!",
                'content' => "Quin és el lloc preferit dels vampirs? El banc de sang!"
            ],
            [
                'title' => "Aquest elefant màgic et sorprendrà!",
                'content' => "Com es diu un elefant que fa màgia? Un elefantàstic!"
            ],
            [
                'title' => "Què fa un ou a l'espai? La resposta és increïble!",
                'content' => "Què fa un ou a l’espai? Es converteix en un estel ou-nidós!"
            ],
            [
                'title' => "Què fa un ou a l'espai? La resposta és increïble!",
                'content' => "Què fa un ou a l’espai? Es converteix en un estel ou-nidós!!!"
            ]
        ];
        
        foreach ($acudits as $acudit) {
            Post::create([
                'title' => $acudit['title'], // O pots generar un títol amb Faker si vols
                'content' => $acudit['content'],
                'user_id' => $users->random()->id,
            ]);
        }
        
    }
}
