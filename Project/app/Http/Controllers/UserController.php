<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateWallet(Request $request)
    {
        $user = User::find(1);

        // $user_wallet = $user->wallet;
        // $user_wallet += 100000;
        // $user->wallet = $user_wallet;
        // $user->save();

        // $user->update(['wallet' => $user_wallet]);

        $user->increaseWallet(100000);
    }
}
