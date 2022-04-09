<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    public static function createUser(array $request)
    {
        $user = self::create($request);

        return $user;
    }


    public function updateUser(array $request)
    {
        $this->update($request);

        return $this;
    }


    public function deleteUser()
    {
        return $this->delete();
    }

    // function
    public function roleHtml()
    {
        if ($this->role == self::ROLE_USER) {
            return '<span class="badge badge-warning">User</span>';
        } else if ($this->role == self::ROLE_ADMIN) {
            return '<span class="badge badge-success">Admin</span>';
        } else {
            return '-';
        }
    }

    public static function dt()
    {
        $data = self::where('created_at', '!=', NULL)->orderBy('created_at', 'desc');
        return \Datatables::eloquent($data)
            ->addColumn('action', function ($data) {

                $action = '
					<div class="dropdown">
						<button class="btn btn-primary px-2 py-1 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pilih Aksi
						</button>
						<div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('admin.user.edit', $data->id) . '">
                            <i class="fas fa-edit"></i> Edit
                            </a>

                            <a class="dropdown-item" href="' . route('admin.user.detail', $data->id) . '">
                            <i class="fas fa-eye"></i> Detail
                            </a>

							<a class="dropdown-item delete" href="javascript:void(0)" data-delete-message="Yakin ingin menghapus?" data-delete-href="' . route('admin.user.destroy', $data->id) . '">
								<i class="fas fa-trash mr-1"></i> Hapus
							</a>

						</div>
					</div>';

                return $action;
            })

            ->editColumn('role', function ($data) {
                return $data->roleHtml();
            })

            ->rawColumns(['action', 'role'])
            ->make(true);
    }
}
