<?php

namespace App\Http\Middleware;
use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Closure;
use Illuminate\Http\Request;

class ValidateForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $allInput = $request->all();
        if((strlen($allInput['name']))&&strlen($allInput['family'])&&strlen($allInput['age'])  )
        {

            return redirect("/ok/".$allInput['name'].'/'.$allInput['family'].'/'.$allInput['age']);
        }
        $emptyValue = '';
        if(!(strlen($allInput['name'])))
        {
            if(strlen($emptyValue))
                $emptyValue.=" , Имя";
            else
                $emptyValue.="Имя";
        }
        if(!(strlen($allInput['family'])))
        {
            if(strlen($emptyValue))
                $emptyValue.=" , Фамилия";
            else
                $emptyValue.="Фамилия";
        }
        if(!(strlen($allInput['age'])))
        {
            if(strlen($emptyValue))
                $emptyValue.=", Возраст";
            else
                $emptyValue.="Возраст";

        }


        return redirect('/noValidate/Пустое поле:'.$emptyValue);

    }
}
