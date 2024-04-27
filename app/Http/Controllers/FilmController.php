<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {

      /*  if($request->isMethod('post')){    //stavio sam u post zbog forme i post rute pa tu se vrsi filtracija

           $rule=[
                'rating' => 'nullable|integer|between:1,10',
                'year_from' => 'nullable|date_format:Y|before_or_equal:today',
                'year_to' => 'nullable|date_format:Y|before_or_equal:today',
                'time_from' => 'nullable|integer|min:1',
                'time_to' => 'nullable|integer|min:1'
            ];
    
            if($request->year_from && $request->year_to){
                $rule['year_to'].='|gte:year_from';
            }
            
            if($request->time_from && $request->time_to){
                $rule['time_to'].='|gte:time_from';
            }

            $request->validate($rule); */


           // $rating= $request->rating;  // pokupio sam name="rating" iz inputa
           
    

           /* $datas= Film::when($rating, function($query) use ($rating){   //ovo when bi menjalo if, npr if($rating){pa uslov} ako ne vrati $datas::Film->all() znaci proverava da li smo popunili formu za rating
                $query->where('rating','>=', $rating);
            })
            ->when($yearFrom, function($query) use ($yearFrom){
                $query->where('year', '>=', $yearFrom);
            })
            ->when($yearTo, function($query) use ($yearTo){
                $query->where('year', '<=', $yearTo);
            })

            ->when($timeFrom, function($query) use ($timeFrom){
                $query->where('running_h', '>=', $timeFrom);
            })

            ->when($timeTo, function ($query) use ($timeTo) {
                $query->where(function ($query) use ($timeTo) {
                    $query->where('running_h', '<', $timeTo)
                        ->orWhere(function ($query) use ($timeTo) {
                            $query->where('running_h', '=', $timeTo)
                            ->whereNull('running_m');
                        });
                });
                //select * from films where running_h<GORNJE_GRANICE ili (running_h=GORNJE_GRANICE and running_m is null)
            })
            ->when($name, function ($query) use ($name){
                $query->where('name' ,'like',  "%".$name."%");
            })

           ->when($genre, function ($query) use ($genre){
                $query->whereHas('genres', function($query) use($genre){
                    $query->where('id', $genre);
                });
            })

            ->when($star, function ($query) use ($star){
                $query->whereHas('stars', function($query) use($star){
                    $query->where('id', $star);
                });
            })

            ->get();*/
          /*  
        }else{
          
            $datas= Film::orderBy('name')->paginate(5);
            $populateData=[];
        }*/

        $datas=Film::latest()->filter(
            request(['search','rating','year_from', 'year_to','genre','star'])

        )->paginate(5);

        $populateData= $request->all();
        $genres=Genre::all();
        $people= Person::all();

        return view('film.index',
        [
            'datas'=>$datas,
            'populateData'=> $populateData,
            'genres'=> $genres,
            'people'=>$people
            
        ]);
  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres= Genre::all()->sortBy('name');
        $people= Person::all();

        return view('film.create',
        [
        'genres'=>$genres,
        'people'=>$people

    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate(
            [
                
                'name'=>'required',
                'running_h'=> 'nullable|numeric|min:1|integer',
                'running_m'=> 'nullable|numeric|between:1,59|integer',
                'year'=>'required|date_format:Y|before_or_equal:today',
                'rating'=>'required|decimal:1|between:1,10',
                'directors'=>'required|array',
                'writers'=>'required|array',
                'stars'=>'required|array',
                'genres'=>'required|array',
                'image' => 'image|between:1,2048'
            ]);

            //mora $request bez promeljive pre nje zbog metode only(), a u tom slucaju navodimo u modelu fillable

        $film= Film::create($request->only('name','running_h','running_m','year','rating'));
        $film->genres()->attach($request->genres); // genres() je onaj iz beleongsToMany  a $request skuplja genres iz niza gore iz validacije
        $film->writers()->attach($request->writers); //ostvaruju se veze za sam upis podataka u tabelu
        $film->stars()->attach($request->stars);
        $film->directors()->attach($request->directors);   // attach() za dodavanje 

        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imgName = $film->id. '.'. $request->file('image')->extension();
            $path = $request->file('image')->storeAs('film_images', $imgName, 'public');
            
            // čuvanje putanje slike u bazi podataka
            $film->image = $path;
            $film->save();
        }
        

        return redirect()->route('film.show',['film'=>$film]);  // salje na taj napravljeni film

    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        

        return view('film.show' ,[
            'film'=> $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {

        $genres= Genre::all()->sortBy('name');
        $people= Person::all();

        return view('film.edit', [
            'film'=>$film,
            'genres'=>$genres,
            'people'=>$people
        
        ]);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate(
            [
                'name'=>'required',
                'running_h'=> 'nullable|numeric|min:1|integer',
                'running_m'=> 'nullable|numeric|between:1,59|integer',
                'year'=>'required|date_format:Y|before_or_equal:today',
                'rating'=>'required|decimal:1|between:1,10',
                'directors'=>'required|array',
                'writers'=>'required|array',
                'stars'=>'required|array',
                'genres'=>'required|array',
                'image' => 'image|between:1,2048'
            ]);

        //mora $request bez promeljive pre nje zbog metode only(), a u tom slucaju navodimo u modelu fillable

        $film->update($request->only('name','running_h','running_m','year','rating'));
        $film->genres()->sync($request->genres); // genres() je onaj iz beleongsToMany  a $request skuplja genres iz niza gore iz validacije
        $film->writers()->sync($request->writers); //ostvaruju se veze za sam upis podataka u tabelu
        $film->stars()->sync($request->stars);
        $film->directors()->sync($request->directors);   // sync() za izmenu 


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if($film->image && Storage::disk('public')->exists($film->image)){ // ispitujemo da li postoji slika, ako postoji obrisi je, neophodno je zbog extenzije slike ako nisu ista prethodna i nova koja se postavlja
                Storage::disk('public')->delete($film->image);
            }
            $imgName = $film->id. '.'. $request->file('image')->extension();
            $path = $request->file('image')->storeAs('film_images', $imgName, 'public');     // obrisao staru i ovde standardno postavlja novu
            
            // cuvanje putanje slike u bazi podataka
            $film->image = $path;
            $film->save();
        }elseif($request->image_remove=='yes'){   // uzimamo iz inputa iz js provarevamo ako je yes tj da li je ukolonio klikom
            if($film->image && Storage::disk('public')->exists($film->image)){ // ispitujemo da li postoji slika, ako postoji obrisi je, i postavi mi u bazi vrednost null
                Storage::disk('public')->delete($film->image);
            }
            $film->image = null;   // ako ne setuj na null u bazi, a on prikazuje ono sto smo zadali u src kao default vec iz foldera
            $film->save();

        }         
          
            return redirect()->route('film.show',['film'=>$film]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
            $film->delete();
        
            session()->flash('alertType','success');
            session()->flash('alertMsg','Successfully deleted');
    
            return redirect()->route('film.index');

    }
}
