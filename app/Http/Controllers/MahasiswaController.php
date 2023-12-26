<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
        {
            $students = Mahasiswa::all();
            return response()->json([
                'students' => $students
            ]);
        }
        public function show($id)
        {
            $mahasiswa = Mahasiswa::find($id);
            if (!$mahasiswa) {
                return response()->json([
                    'message' => 'Mahasiswa tidak ditemukan'
                ], 404);
            }
            return response()->json(['data' => $mahasiswa]);
        }
        public function store(Request $request)
        {
            $mahasiswa = Mahasiswa::create([
                'Nama'     => $request->input('Nama'),
                'Prodi'  => $request->input('Prodi'),
                'Angkatan' => $request->input('Angkatan'),
            ]);
    
            return response()->json([
                'message' => 'Mahasiswa berhasil dibuat',
                'students' => $mahasiswa
            ], 201);
        }
        public function update(Request $request, $id)
        {
            $mahasiswa = Mahasiswa::find($id);
    
            if ($mahasiswa) {
                return response()->json([
                    'message' => 'Mahasiswa tidak ditemukan'
                ], 404);
            }
            $mahasiswa->Nama  = $request->input('Nama');
            $mahasiswa->Prodi = $request->input('Prodi');
            $mahasiswa->Angkatan = $request->input('Angkatan');
            $mahasiswa->save();
    
            return response()->json([
                'message' => 'Mahasiswa berhasil diperbarui',
                'students' => $mahasiswa
            ], 200);
        }
        public function destroy($id)
        {
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->delete();
    
            return response()->json([
                'message' => 'Mahasiswa berhasil dihapus'
            ], 200);
        }
    
    }    
