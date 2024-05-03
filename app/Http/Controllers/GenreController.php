<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $local=App::currentLocale();

        if($local=='en'){
            //$data = Genre::orderBy('name_en')->get();
            $data = Genre::orderBy('name_en')->paginate(5);
        }elseif($local=='sr'){
            $data = Genre::orderBy('name_sr')->paginate(5);
        }else{
            $data = Genre::all();
        }
        // all dobavlja sve podatke
        return view('genre.index', ['genres'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|unique:genres,name_en',
            'name_sr' => 'nullable|unique:genres,name_sr'
            ]);
         
            Genre::create($request->all());

            $request->session()->flash('alertType','success');
            $request->session()->flash('alertMsg','Successfully added');

            return redirect()->route('genre.index');
            
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
       

        // Prosleđivanje promenljive $genre u predložak
        return view('genre.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $form_filds=$request->validate([
            'name_en' => ['required', Rule::unique('genres','name_en')->ignore($genre->id)], //ignorisi kokretno menjane ovog polja pod id koji je auction npr, i tad ce dozvoliti izmenu njega, ali nmg npr da promenim auction u drama jer vec drama postoji
            'name_sr' => ['nullable', Rule::unique('genres','name_sr')->ignore($genre->id)]
            ]);

            //ili $genre->update($request->all());
            $genre->update($form_filds);

            $request->session()->flash('alertType','success');
            $request->session()->flash('alertMsg','Successfully update');

            return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {


        try{
            $genre->delete();
        
            session()->flash('alertType','success');
            session()->flash('alertMsg','Successfully deleted');
    
            return redirect()->route('genre.index');
        }catch(Exception $e){
            
            session()->flash('alertType','danger');
            session()->flash('alertMsg','Cannot be deleted');

            return redirect()->route('genre.index');
        }

       

    }
}
