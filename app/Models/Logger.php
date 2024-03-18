<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
use App\Models\LogProfessor;

class Logger extends Model
{
    public function log($level,$descricao)
    {

        if(Auth::user())
        {
           Logs::create([
                'user_id' => Auth::user()->id,
                'descricao' => $descricao,
                'endereco' => $_SERVER['REMOTE_ADDR'],
                'dispositivo' =>  $_SERVER['HTTP_USER_AGENT'],
            ]);
            $descricao = '-'.$descricao;

        }
        else{
            $descricao = 'erro'.'-'.$descricao;
        }


    Log::channel('logUser')->$level($descricao);

    }

    public  function LogsForSearch($datatime, $user)
    {

        $response['logs'] =Logs::join('users', 'logs.id_user', '=', 'users.id')
        ->select('logs.*','users.name');

        if($datatime !="null")
            $response['logs']->whereYear('logs.created_at', '=', $datatime);

        if($user !="null")
            $response['logs']->where([['users.name', '=', $user]]);


          return  $response['logs']->get();
    }
}
