<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class LoginController extends Controller
{

    use issueToken;
    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function login(Request $request)
    {

        $this->validate($request,[
           'username' => 'required',
            'password' => 'required|min:6'
        ]);

       return $this->issueToken($request,'password');
    }

    public function refresh(Request $request){

        $this->validate($request,[
            'refresh_token' => 'required'
        ]);

       return $this->issueToken($request,'refresh_token');
    }

    public function logout(Request $request){

        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id',$accessToken->id)->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([],204);
    }
}
