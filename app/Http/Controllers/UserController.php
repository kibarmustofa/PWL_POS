<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //pertemuan 3
        // tambah data user dengan Eloquent Model
        //$data = [
        //    'nama' => 'Pelanggan Pertama',
        //];
        //UserModel::where('username', 'customer-1')->update($data); // update data user

        //$data = [
        //    'level_id' => 2,
        //    'username' => 'manager_tiga',
        //    'nama' => 'Manager 3',
        //    'password' => Hash::make('12345')
        //];
        //UserModel::create($data);
        
        // coba akses model UserModel
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);
        
        $user->username = 'manager12';
        
        $user->save();
        
        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama'); // false
        
        dd($user->wasChanged(['nama', 'username'])); // true
    }
}