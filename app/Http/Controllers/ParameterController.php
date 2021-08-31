<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //if(Auth::user()->hasPermissionTo('create parameters')) {
                if($parameter = Parameter::create($request->all())) {
                    return redirect()->back()->with('success','Parameter created successfully');
                }
            //}
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                'parameter' => 'No se pudo crear el parametro. Intenta más tarde.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //if(Auth::user()->hasPermissionTo('delete movies')) {
            $parameter = Parameter::find($request['id']);
            if ($parameter) {
                if ($parameter->delete()) {
                    return response()->json([
                        'message' => 'parameter deleted successfully',
                        'code' => '200',
                    ]);
                }
            }
            return response()->json([
                'message' => 'We couldt delete the parameter',
                'code' => '400',
            ]);
        //}
    }
}
