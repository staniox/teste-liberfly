<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new User
     *
     * @param UserStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserStoreRequest $request): JsonResponse
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->json([
            'message' => 'usuário registrado com sucesso',
        ]);
    }
    /**
     * Get all users.
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {

        return response()->json(User::all());

    }

    /**
     * Get user by id.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function showUser(Request $request): JsonResponse
    {

        if (! $user = User::find($request->route('id'))) {
            return response()->json(['error' => 'usuário não encontrado'], 404);
        }

        return response()->json($user);

    }

    /**
     * Get user by id.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {

        if (! $user = User::destroy($request->route('id'))) {
            return response()->json(['error' => 'usuário não encontrado'], 404);
        }

        return response()->json(['message' => 'usuário excluido com sucesso']);

    }
}
