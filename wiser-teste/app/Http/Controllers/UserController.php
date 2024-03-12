<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Faker\Factory as Faker;

class UserController extends Controller
{
   
    public function store(Request $request)
    {
        $faker = Faker::create();
        $user = new User;
        do {
            $email = $faker->unique()->safeEmail();
        } while (User::where('email', $email)->exists());
        $user->name = $faker->name;
        $user->email = $email;
        $user->password = bcrypt($faker->password);
        $user->save();
        //Log::info('User saved: ', $user->toArray());
        $message = 'Usuário ID: ' . $user->id . ', Nome: ' . $user->name . ', criado com sucesso!';
        return response()->json(['message' => $message, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $faker = Faker::create();        
        $user = User::inRandomOrder()->first();
        if ($user) {
            $user->name = $faker->name;
            $user->save();
            $message = 'Usuário ID: ' . $user->id . ', Nome: ' . $user->name . ', atualizado com sucesso!';
            return response()->json(['message' => $message, 'user' => $user]);
        } else {
            return response()->json(['message' => 'Nenhum usuário encontrado para atualizar.']);
        }
    }

    public function destroy()
    {
        $user = User::inRandomOrder()->first();
        if ($user) {
            $message = 'Usuário ID: ' . $user->id . ', Nome: ' . $user->name . ', excluído com sucesso!';
            $user->delete();
            
            return response()->json(['message' => $message]);
        } else {
            return response()->json(['message' => 'Nenhum usuário encontrado para excluir.']);
        }
    }

    public function getLogs()
    {
        $logs = file_get_contents(storage_path('logs/laravel.log'));
        return response($logs, 200, ['Content-Type' => 'text/plain']);
    }
}
