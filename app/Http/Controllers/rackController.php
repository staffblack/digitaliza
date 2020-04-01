<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\rack;
use Illuminate\Http\Request;

class rackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $rack = rack::where('id', 'LIKE', "%$keyword%")
                ->orWhere('rack', 'LIKE', "%$keyword%")
                ->orWhere('observacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $rack = rack::latest()->paginate($perPage);
        }

        return view('rack.index', compact('rack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        rack::create($requestData);

        return redirect('rack')->with('flash_message', 'rack added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $rack = rack::findOrFail($id);

        return view('rack.show', compact('rack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $rack = rack::findOrFail($id);

        return view('rack.edit', compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $rack = rack::findOrFail($id);
        $rack->update($requestData);

        return redirect('rack')->with('flash_message', 'rack updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        rack::destroy($id);

        return redirect('rack')->with('flash_message', 'rack deleted!');
    }
}
