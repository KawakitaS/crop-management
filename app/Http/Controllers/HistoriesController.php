<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\History;    // 追加
use App\User;    // 追加

class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
        $user = \Auth::user();
        $histories = History::all();
        return view('histories.index', [
            'histories' => $histories,
        ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $history = new history;
        return view('histories.create', [
            'history' => $history,
        ]);
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
        $this->validate($request, [
        'crop' => 'required|max:10', 
        'cultivar' => 'required|max:255',
        ]);

        $history = new history;
        $hitory->crop = $request->crop; 
        $hitory->cultivar = $request->cultivar;
        $hitory->save();
        return redirect('/');
        
        */
        
        $this->validate($request, [
        'place' => 'required|max:20',
        'crop' => 'required|max:20',
        'cultivar' => 'required|max:255',
        'seedingday' => 'required|max:20',
        ]);
        
        $request->user()->histories()->create([
            'place' => $request->place,
            'crop' => $request->crop,
            'cultivar' => $request->cultivar,
            'seedingday' => $request->seedingday,
        ]);
    
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        if (\Auth::check()) {
            $history = History::find($id);
            if (\Auth::user()->id === $history->user_id) {
                $history = History::find($id);
                return view('histories.show', [
                    'history' => $history,
                    ]);           
            }else{
                return redirect('/');
                
            }
        }else{
            return redirect('/');
        }
        
        
        
        /*
        $user = User::find($id);
        $histories = $user->histories()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'histories' => $histories,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
        */
        
        /*
        $history = History::find($id);
        $histories = $user->histories()->orderBy('created_at', 'desc')->paginate(15);
        return view('histories.show', [
            'history' => $history,
        ]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $history = History::find($id);
        return view('histories.edit', [
        'history' => $history,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'crop' => 'required|max:20',   // 追加
        'cultivar' => 'required|max:255',
        ]);

        $history = History::find($id);
        $history->place = $request->place;    // 追加
        $history->crop = $request->crop;    // 追加
        $history->cultivar = $request->cultivar;
        $history->seedingday = $request->seedingday;    // 追加
        $history->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = History::find($id);
        $history->delete();

        return redirect('/');
    }
}
