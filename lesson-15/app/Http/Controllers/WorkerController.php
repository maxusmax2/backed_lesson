<?php

namespace App\Http\Controllers;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class WorkerController extends Controller
{
    public function part1(){
        return Cache::get('part1' ,function(){
            $partOneData = Worker::
                where([['number',1015],
                       ['series',422269]])
                ->get();

            Cache::put('part1',$partOneData);
            return Cache::get('part1');
        });
    }

    public function part2(){
        return Cache::get('part2' ,function(){
            $partTwoData = Worker::
            where('first_name','Алексей')
            ->where('birthday','>','1999-7-1')
            ->get();

            Cache::put('part2',$partTwoData);
            return Cache::get('part2');
        });

    }

    public function part3(){
        return Cache::get('part3' ,function(){
            $partThreeData = Worker::
            where('company','=','Северсталь')
            ->count();

            Cache::put('part3',$partThreeData);
            return Cache::get('part3');
        });
    }

    public function part4(){
        return Cache::tags('part4tags')->get('part4' ,function(){
            $partFourData = Worker::
                groupBy('first_name','last_name')
                ->where('role','Инженер')
                ->where([['birthday','>','1979-12-1'],['birthday','<','1980-2-1']])
                ->get();

            Cache::tags('part4tags')->put('part4',$partFourData);
            return Cache::tags('part4tags')->get('part4');
        });
    }

    public function part5(){
        return Cache::tags('part5tags')->get('part5' ,function(){
            $partFourData = Worker::
            where('role','Химик-технолог')->orWhere('role',"Химик")->orWhere('role',"Биохимик")
            ->where('company','X5 Retail Group')
            ->orderBy('birthday','ASC')
            ->get();

            Cache::tags('part5tags')->put('part5',$partFourData);
            return Cache::tags('part5tags')->get('part5');
        });
    }
}
