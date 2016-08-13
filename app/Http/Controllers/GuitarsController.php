<?php

namespace App\Http\Controllers;

use App\Guitar;
use Illuminate\Http\Request;

class GuitarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'find']]);
    }

    /**
     * Retrieve all
     * @return JSON array   App\Guitar
     */
    public function index()
    {
        $guitars = Guitar::all();

        return response()->json($guitars);
    }

    /**
     * Fetch single guitar
     * @param  Integer $id Guitar ID
     * @return JSON     App\Guitar
     */
    public function find($id)
    {
        $guitar = Guitar::find($id);

        return response()->json($guitar);
    }

    /**
     * Create new App\Guitar
     * @param  Request $req user input
     * @return JSON App\Guitar
     */
    public function create(Request $req)
    {
        $guitar = Guitar::create($req->all());

        return response()->json($guitar);
    }

    /**
     * Update existing App\Guitar
     * @param  Request $req, $id
     * @return JSON App\Guitar
     */
    public function update(Request $req, $id)
    {
        $guitar = Guitar::find($id);

        $result = $guitar->update($req->all());

        return response()->json(['updated'=> $result]);
    }

    /**
     * Delete App\Guitar
     * @param  Integer $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $guitar = Guitar::destroy($id);

        return response()->json(['deleted'=> $guitar == 1]);
    }


}
