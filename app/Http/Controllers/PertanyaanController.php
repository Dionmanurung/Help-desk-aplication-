<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function index() {
        return view('pertanyaan');
    }
//     public function pertanyaan(Request $request)
// {
//     // Validate the form data
//     $validatedData = $request->validate([
//         'teks' => 'required',
//     ]);

//     // Create a new question with the validated data
//     $pertanyaan = new pertanyaan();
//     $pertanyaan->title = $validatedData['title'];
//     $pertanyaan->save();

//     // Redirect the user back to the form
//     return redirect('/qna')->with('success', 'Your question has been submitted!');
// }
public function create(Request $request) {

    if(auth()->check()){
    $ask = new Pertanyaan;
    $ask->teks = $request->input('teks');
    $ask->id_m_pengguna = auth()->user()->id;
    $ask->save();
    
    return redirect('/qna')->with('success', 'Your question has been submitted!');
    } else {
        return redirect('/ask')->with('error', 'Silakan login untuk mengirimkan pertanyaan.');
    }
}   
}
