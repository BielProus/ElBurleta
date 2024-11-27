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
            "Per què els músics sempre es perden? Perquè estan buscant el to!",
            "Què fa un vampir en un tractor? Agricultura de sang!",
            "Saps com es diu un peix que sona? Un dofí silenciador!",
            "Per què els gats no expliquen acudits? Perquè són massa seriosos per riure!",
            "Com es diu un gos mag que fa trucs? Un dog-ma!",
            "Quin és l’ocell més fort? L’ocell de ferro, perquè pesa una tona!",
            "Per què els tomàquets mai juguen a cartes? Perquè no volen fer salsa!",
            "Com li dius a un pingüí que surt a fer exercici? Un 'run-guí'!",
            "Què diu un pollastre que es diverteix molt? 'Que guai, quina ploma!'",
            "Què fa un ànec a la discoteca? 'Duck-step'!",
            "Què passa si tires un llibre al riu? Que es converteix en una novel·la aquàtica!",
            "Quin és l’animal més educat? El cocodril, perquè sempre saluda amb 'croc'!",
            "Com es diu un cuc que sap ballar? Un cucba!",
            "Per què el professor de música es va enfadar? Perquè el piano estava desafinat!",
            "Com fa un vaixell que està content? Va xiulant!",
            "Per què els ordinadors no prenen cafè? Perquè ja tenen moltes instruccions!",
            "Quin és el fruit que sempre està cansat? La taronja, perquè s’esprem massa!",
            "Per què els esquelets mai porten rellotge? Perquè el temps els passa pels ossos!",
            "Com es diu un ós que es vesteix elegant? Un ósmoda!",
            "Què fa un cangur boxejador? Saltar a l’arena!",
            "Per què els peixos no van a l’escola? Perquè ja viuen en el corrent!",
            "Quin és el lloc preferit dels vampirs? El banc de sang!",
            "Com es diu un elefant que fa màgia? Un elefantàstic!",
            "Què fa un ou a l’espai? Es converteix en un estel ou-nidós!",
            "Què diu una vaca quan arriba a un prat verd? 'Quina herba tan deliciosa!'",
            "Què fa un astronauta quan li pica el cap? Es rasca l’espai!",
            "Per què els dinosaures no viuen avui dia? Perquè ja no caben a cap pis!",
            "Què li diu una llimona a un altre? 'Estem pelats!'",
            "Per què les bicicletes no es queixen mai? Perquè tenen molta resistència!",
            "Què fa una mosca en una sopa? Practica natació sincronitzada!",
            "Com es diu un cactus graciós? Un punxant-tista!",
            "Què diu un lleó quan veu un safari? 'Quin banquet mòbil!'",
            "Per què les estrelles mai arriben tard? Perquè sempre són puntuals amb l’òrbita!",
            "Com es diu un gos que estudia? Un 'perru-llibre'!",
            "Per què els cargols no necessiten bitllet? Perquè porten casa seva a sobre!",
            "Què fa una aranya a Internet? Teixir la seva xarxa!",
            "Per què les serps no tenen amics? Perquè són massa enrotllades!",
            "Què fa un peix amb ulleres? Mira millor sota l’aigua!",
            "Com es diu un cavall que fa bromes? Un cavall-riure!",
            "Per què els ànecs sempre estan contents? Perquè sempre tenen una ploma per escriure!",
            "Què diu un arbre a un altre? 'Estàs arrelat a la terra?'",
            "Què fa un astronauta a la lluna? Practica passos lleugers!",
            "Per què els ocells no gasten diners? Perquè sempre estan volant gratis!",
            "Com es diu un coet graciós? Un 'riure-a-l’espai'!",
            "Què passa si barreges una sargantana amb un camaleó? Un 'sarga-leó'!",
            "Per què els robots no menteixen? Perquè estan programats per ser sincers!",
            "Què fa un tauró a classe de matemàtiques? Practica divisió submarina!",
            "Què diu un gos quan veu un gat al cinema? 'Quina pel·li més guau!'",
            "Com es diu un ou graciós? Un 'humor-ou'!"
        ];
        foreach ($acudits as $acudit) {
            Post::create([
                'title' => 'Acudit', // O pots generar un títol amb Faker si vols
                'content' => $acudit,
                'user_id' => $users->random()->id,
            ]);
        }
        
    }
}
