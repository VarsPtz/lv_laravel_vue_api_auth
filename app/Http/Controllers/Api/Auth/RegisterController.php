<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\Auth\RegisterFormRequest;
use App\User;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterFormRequest $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'email'),
            (['password' => bcrypt($request->password)])
        ));
        

        return response()->json([
            'message' => 'Регистрация успешна. Можете войти на сайт'
        ], 200);
    }
}
