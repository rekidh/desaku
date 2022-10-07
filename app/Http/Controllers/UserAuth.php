<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

use function GuzzleHttp\Promise\all;

class UserAuth extends Controller
{

    public function userRegister(Request $req)
    {

        $req->validate(
            [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'unique:users'],
                'password' => ['required', 'min:8', 'max:255'],
                'password2' => ['same:password']
            ]
        );

        try {
            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),

            ]);
            if ($user) {
                return redirect('/login');
            }
        } catch (\Exception $e) {
            return back()->with('registerError', 'Terjadi Kesalahan');
        }
    }

    public function userLogin(Request $req)
    {
        try {

            $userData = $req->validate(
                [
                    'email' => ['required', 'email'],
                    'password' => ['required', 'min:8'],
                ]
            );
            if (Auth::attempt($userData)) {

                $req->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            return back()->with('loginError', 'Login failed');
        } catch (\Throwable $th) {
            return back()->with('loginError', 'Login failed');
            //throw $th;
        }
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();          //<= destroy session
        $req->session()->regenerateToken();     // make new session
        return redirect('/login');
    }


    public function updateProfile(Request $req)
    {
        try {
            if (Hash::check($req->password, Auth::user()->password)) {  //cek password lama
                $userId = Auth::user()->id;
                $update = User::find($userId);

                //inline check file
                $update->name = $req->name;
                $update->email = $req->email;
                if ($req->new_password) {
                    $update->password = $req->new_password;
                }
                $update->save();

                return back()->with('update', 'perubahan berhasil di simpan');
            }
            return back()->with('updateErr', 'sepertinya anda tidak memasukan password');
        } catch (\Exception $e) {
            return back()->messages();
            // back()->with('update', 'Terjadi Kesalahan');
        }
        // $array = $req->all();
        // $isNull = [];
        // $notNull = [];

        // foreach ($array as $key => $value) {
        //     if (is_null($value)) {
        //         $isNull[$key] = $value;
        //     } else {
        //         $notNull[$key] = $value;
        //     }
        // }

    }

    public function userImage(Request $req)
    {
        if ($req->file('image')) { // cek ada apa tidaknya image baru
            if ($req->old_image) {
                $destination = "storage/images/" . $req->old_image;
                File::delete($destination);
            }

            $h = getdate();
            $req->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $name = str_replace(' ', '_', Auth::user()->name);
            $imageName = $name . '_' . $h["year"] . '_' . $h["mon"] . '_' . $h["mday"] . 'S' . $h[0] .  '.' . $req->image->extension(); // name format
            $req->image->move(public_path('storage/images'), $imageName);

            $userId = Auth::user()->id;
            $update = User::find($userId);
            $update->user_image = $imageName;
            if ($update->save()) {
                return back()->with('update', 'Image uploaded Successfully!');
            }
            return back()->with('updateErr', 'Image uploaded Error!');
        };
    }
}
