<?php

namespace App\Http\Controllers;

use App\classes\Item;
use App\classes\Character; 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class BlizzardController extends Controller
{

    private function getCharacterSummary($summary, $json_object, $media, $character_items){
        $character = new Character;
 
        $name = $json_object['character']['name'];
        $race = $json_object['playable_race']['name'];  
        $class = $json_object['playable_class']['name']; 
        $spec = $json_object['active_spec']['name'];
        $char_level = $summary['level'];
        $char_image= $media['assets'][2]['value'];
        $char_average_item_level = $summary['average_item_level'];
    
        $itemsArray = array();
 
        for($i = 0; $i < count($character_items['equipped_items']); $i++){
            $itemlvl = $character_items['equipped_items'][$i]['level']['display_string'];
            $itemName = $character_items['equipped_items'][$i]['name'];
             
            $item = new Item();
            $item->item_level = $itemlvl;
            $item->name = $itemName;

            array_push($itemsArray, $item);
        }

        $character->items = $itemsArray;
        $character->image = $char_image;
        $character->level = $char_level;
        $character->name = $name;
        $character->race = $race;
        $character->playable_class = $class;
        $character->specialization = $spec;
        $character->average_item_level = $char_average_item_level;
        
        return $character;
    }


    public function index(){
        $promise = Http::async()->get('https://eu.api.blizzard.com/profile/wow/character/tarren-mill/frizera/appearance?namespace=profile-eu&locale=en_US&access_token=EUNuUo1bVhERA9Mc4IklQ7hoqB5a7ZJ4Jm')
                                ->then(function ($response) {
                                    return $response;
                                }); 

       $json =  json_decode($promise->wait(), true);

        $character_profile_summary = Http::async()->get('https://eu.api.blizzard.com/profile/wow/character/tarren-mill/frizera?namespace=profile-eu&locale=en_EU&access_token=EUNuUo1bVhERA9Mc4IklQ7hoqB5a7ZJ4Jm')
                                ->then(function ($response) {
                                    return $response;
                                }); 

       $json_summary =  json_decode($character_profile_summary->wait(), true);

       $char_media = Http::async()->get('https://eu.api.blizzard.com/profile/wow/character/tarren-mill/frizera/character-media?namespace=profile-eu&locale=en_EU&access_token=EUNuUo1bVhERA9Mc4IklQ7hoqB5a7ZJ4Jm')
                                ->then(function ($response) {
                                    return $response;
                                }); 

       $json_media =  json_decode($char_media->wait(), true);

       $char_items = Http::async()->get('https://eu.api.blizzard.com/profile/wow/character/tarren-mill/frizera/equipment?namespace=profile-eu&locale=en_US&access_token=EUNuUo1bVhERA9Mc4IklQ7hoqB5a7ZJ4Jm')
       ->then(function ($response) {
           return $response;
       }); 

        $json_items =  json_decode($char_items->wait(), true);



        return view('main', [
            'profile_summary' => $this->getCharacterSummary($json_summary,$json, $json_media, $json_items)
        ]);
    }
}
