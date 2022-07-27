<?php

namespace App\Http\Controllers;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function part1(){
        return Worker::
            where([['number',1015],
            ['series',422269]])
            ->get();
    }

    public function part2(){
        return Worker::
            where('first_name','Алексей')
            ->where('birthday','>','1999-7-1')
            ->get();
    }

    public function part3(){
        return Worker::
            where('company','=','Северсталь')
            ->count();
    }

    public function part4(){
        return Worker::
            groupBy('first_name','last_name')
            ->where('role','Инженер')
            ->where([['birthday','>','1979-12-1'],['birthday','<','1980-2-1']])
            ->get();
    }

    public function part5(){
        return Worker::
            where('role','Химик-технолог')->orWhere('role',"Химик")->orWhere('role',"Биохимик")
            ->where('company','X5 Retail Group')
            ->orderBy('birthday','ASC')
            ->get();
    }
}
