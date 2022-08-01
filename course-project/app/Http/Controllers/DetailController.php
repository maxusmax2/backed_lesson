<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
use App\Models\Commercial;
use App\Models\Cottage;
use App\Models\Land;
use Illuminate\Http\Request;
use App\Models\Room;

class DetailController extends Controller
{
    /**
     * return JSON with detail build,and image
     * attribute buildType and id build
     */
    function getDetail(string $buildType, int  $id){

        switch ($buildType){
            case 'rooms':
                return Room::find($id)->get();
            case 'apartaments':
                return Apartament::find($id)->get();
            case 'land':
                return Land::find($id)->get();
            case 'Cottage':
                return Cottage::find($id)->get();
            case 'Commercial':
                return  Commercial::find($id)->get();
        }
    }
}
