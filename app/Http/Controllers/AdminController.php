<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use JWTAuth;
use JWTAuthException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminController extends Controller
{
    use AuthenticatesUsers;

	public function __construct()
	{
        auth()->shouldUse('admin');

	}

	public function login(Request $request) {
        // dd($request->email);
    if (!$token = auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
            return $this->respondWithToken($token);

}

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
