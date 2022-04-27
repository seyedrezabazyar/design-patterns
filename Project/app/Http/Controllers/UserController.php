<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        $user = $this->userRepository->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_email' => $request->email,
            'password' => $request->password
        ]);
        if ($user) {
            return back()->with(['message' => 'ثبت نام شما با موفقیت انجام شد.']);
        }
    }
}
