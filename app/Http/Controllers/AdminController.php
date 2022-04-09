<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Setting;
use App\MyClass\Validations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController;

class AdminController extends Controller
{

    const USER = 1;
    // -------------
    // DASHBOARD
    // -------------
    public function index()
    {
        $settings = Setting::getSettingCommon();
        return view('admin.index', [
            'title' => 'Dashboard',
            'settings' => $settings,
        ]);
    }

    // -------------
    // USER
    // -------------
    public function userIndex(Request $request)
    {
        if ($request->ajax()) {
            return User::dt();
        }
        return view('admin.user.index', [
            'title' => 'User',
        ]);
    }

    public function userAdd()
    {
        return view('admin.user.add', [
            'title'            => 'User',
            'breadcrumbs'      => [
                [
                    'title'    => 'Dashboard',
                    'link'    => route('admin'),
                ],
                [
                    'title'     => 'User',
                    'link'      => route('admin.user'),
                ],
                [
                    'title'     => 'Tambah',
                    'link'      => route('admin.user.add'),
                ]
            ]
        ]);
    }

    public function userStore(Request $request, User $user)
    {

        Validations::userValidation($request);

        if ($request->role != null) {
            $role = $request->role;
        } else {
            $role = self::USER;
        }

        DB::beginTransaction();

        try {
            $user->createUser([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $role,
            ]);
            DB::commit();
            return \Res::save();
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }

    public function userEdit(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'breadcrumbs'   => [
                [
                    'title' => "Dashboard",
                    'link'  => route('admin'),
                ],
                [
                    'title' => "User",
                    'link'  => route('admin.user'),
                ],
                [
                    'title' => "Edit",
                    'link'  => route('admin.user.edit', $user->id),
                ]
            ],
        ]);
    }

    public function userUpdate(Request $request, User $user)
    {
        DB::beginTransaction();

        try {
            $user->updateUser($request->all());
            DB::commit();

            return \Res::update();
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }

    public function userDestroy(User $user)
    {
        DB::beginTransaction();

        try {
            $user->deleteUser();
            DB::commit();

            return \Res::delete();
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }

    // ---------------
    // Pengaturan Umum
    // ---------------
    public function settingCommonIndex()
    {
        $title = "Umum";
        $settings = Setting::getSettingCommon();

        return view('admin.setting.common', [
            'title'            => $title,
            'settings'         => $settings,
            'breadcrumbs' => [
                [
                    'title' => "Dashboard",
                    'link'  => route('admin'),
                ],
                [
                    'title' => $title,
                    'link'  => route('admin.setting.common'),
                ],
            ],
        ]);
    }

    public function settingCommonStore(Request $request)
    {

        DB::beginTransaction();

        try {
            $requestAll = $request->all();

            Setting::commonStore($requestAll);

            DB::commit();

            return \Res::save();
        } catch (\Exception $e) {
            DB::rollback();

            return \Res::error($e);
        }
    }
}
