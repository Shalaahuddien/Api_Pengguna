<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    //
        function index()
        {
            $pengguna = User::query()->get();
            return response()->json([
                "status" => true,
                "message" => '',
                "data" => $pengguna
            ]);
        }

        function show($id) {
            $pengguna = User::query()
            ->where("id", $id)
            ->first();
        
        if($pengguna == null)
        {
            return response()->json([
                "status" => false,
                "message" => "Pengguna tidak Ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $pengguna
        ]);

        }

        function store(Request $request) {
            $payload = $request->all();
            if (!isset($payload["name"]))
            {
                return response()->json([
                    "status" => false,
                    "message" => "wajib ada nama",
                    "data" => null
                ]);
            }

            if (!isset($payload["email"]))
            {
                return response()->json([
                    "status" => false,
                    "message" => "wajib ada email",
                    "data" => null
                ]);
            }

            if (request->hasFile(`photo`))
            {

                $imgFile = $request->file('img');
                $imgName = time() . '-' . $imgFile->hashName();
                $path = $request->getSchemeAndHttpHost() . "/img/" . $imgName;
                $imgFile->move('img/', $imgName);
                $getAll['img'] = $path;
            }

            else
            {
                $imgName = "default.jpg";
            }

            if (!isset($payload["password"]))
            {
                return response()->json([
                    "status" => false,
                    "message" => "wajib ada password",
                    "data" => null
                ]);
            }

            //untuk create data
            $pengguna = User::query()->create($payload);
            return response()->json([
                "status" => true,
                "massage" => "",
                "data" => $pengguna
            ]);

        }

        function update(Request $request, $id) {
            
            $pengguna = User::query()
            ->where("id", $id)
            ->first();
        
        if($pengguna == null)
        {
            return response()->json([
                "status" => false,
                "message" => "Pengguna tidak Ditemukan",
                "data" => null
            ]);
        }

            $pengguna->name = $request->input('name');
            $pengguna->email = $request->input('email');
            $pengguna->save();
        return response()->json([
            "success" => true,
            "message" => "Product updated successfully.",
            "data" => $pengguna
            ]);

        }

        function destroy(Request $request, $id) {

            $pengguna = User::query()
            ->where("id", $id)
            ->first();

            $pengguna->delete();
                return response()->json([
            "success" => true,
            "message" => "Product deleted successfully.",
            "data" => $pengguna
            ]);

        }
}

