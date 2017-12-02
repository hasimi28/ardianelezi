<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use \GeniusTS\PrayerTimes\Prayer;
use \GeniusTS\PrayerTimes\Coordinates;
Class HomeComposer{


        public function compose(View $view){

            $longitude = 7.588576;
            $latitude = 47.559599;

            $prayer = new Prayer(new Coordinates($longitude, $latitude));
            // Or
            $prayer = new Prayer();
            $prayer->setCoordinates($longitude, $latitude);

            // Return an \GeniusTS\PrayerTimes\Times instance
            $times = $prayer->times('2017-12-2');
            $times->setTimeZone(+3);

            $imsaku = $times->fajr->format('h:i a');
            $dreka = $times->duhr->format('h:i a');
            $ikindia = $times->asr->format('h:i a');
            $akshami = $times->maghrib->format('h:i a');
            $jacia = $times->isha->format('h:i a');


            $array = ['kohet' => ['imsaku' => $imsaku,'dreka'=>$dreka,'ikindia'=>$ikindia,'akshami'=>$akshami,'jacia'=>$jacia]];

            $view->with('array',$array);

        }


}