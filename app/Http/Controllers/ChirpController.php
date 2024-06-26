<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // añadir with('user') pidiendo el usuario en cada chirp para evitar que luego haga otra consulta trayendo el usuario
        return view('chirps.index',['chirps'=>Chirp::with('user')->orderByDesc('created_at')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message'=>['required','min:3','max:255'],
        ]);

        // Chirp::create([
        //     'message' => $request->get('msg'),
        //     'user_id' => auth()->id()
        // ]);

        $request->user()->chirps()->create(['message' => $request->get('message')]);

        //session()->flash('status','Chirp created');

        return to_route('chirps.index')
        ->with('status','Chirp created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {


        $this->authorize('update', $chirp);
        return view('chirps.edit',['chirp'=>$chirp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        /** @var \App\Models\User $user  **/
        // $user = auth()->user();
        // if($user->isNot($chirp->user)){
        //     abort(403);
        // }

        $this->authorize('update', $chirp);
        $validated = $request->validate([
            'message' => ['required', 'min:3', 'max:255'],
        ]);
    
        $chirp->update($validated);
    
        return to_route('chirps.index')->with('status', 'Chirp updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();

        return to_route('chirps.index')->with('status',__('Chirp deleted!'));
    }
}
