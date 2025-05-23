<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserModel;

class ProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $user = UserModel::find(auth()->id());

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        // Hapus foto lama jika ada
        if ($user->foto_profil && Storage::disk('public')->exists('profile/' . $user->foto_profil)) {
            Storage::disk('public')->delete('profile/' . $user->foto_profil);
        }

        // Buat nama file baru berdasarkan username dan timestamp
        $extension = $request->file('photo')->extension();
        $filename = strtolower($user->username) . '_' . time() . '.' . $extension;

        // Simpan foto ke folder avatars
        $request->file('photo')->storeAs('profile', $filename, 'public');

        // Update kolom foto_profil
        $user->foto_profil = $filename;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Foto berhasil diperbarui.',
            'photo_url' => asset('storage/profile/' . $filename),
        ]);
    }
}
