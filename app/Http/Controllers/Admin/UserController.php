<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mckenziearts\Notify\Action\NotifyAction;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title, $text);

        $users = DB::table('users')->select(['id', 'name', 'email'])->where('role', '=', 'user')->orderBy('created_at', 'DESC')->get();
        return view('admin.user', [
            'users' => $users
        ]);
    }

    public function create()
    {
    }

    public function store()
    {

    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        return view('admin.crudAnggota.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        DB::table('users')->where('id', '=', $id)->update([
            'name' => $request->input('name'),
            'updated_at' => now()
        ]);

        notify()->success()->title('Data Berhasil Diubah')->send();

        return redirect()->route('admin.user');
    }

    public function show()
    {

    }

    public function destroy($id)
    {
        $deleted = DB::table('users')->where('id', '=', $id)->delete();
        if (!$deleted) {
            notify()->error()->title('Data Gagal DiHapus')->send();
            return redirect()->route('admin.user');
        }

        notify()
            ->success()
            ->title('User deleted')
            ->send();

        return redirect()->route('admin.user');
    }
}