<?php

namespace App\MyClass;

class Validations
{
    public static function userValidation($request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8|confirmed',
                'role' => 'required',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email di tolak',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password wajib lebih dari 8 karakter',
                'password.confirmed' => 'Password tidak sama',
                'role.required' => 'Role tidak boleh kosong',
            ]
        );
    }
}
