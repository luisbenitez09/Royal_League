<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RuleController extends Controller
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
            //if(Auth::user()->hasPermissionTo('create rules')) {
                if($rule = Rule::create($request->all())) {
                    return redirect()->back()->with('success','Rule created successfully');
                }
            //}
        } catch (\Throwable $th) {
            throw ValidationException::withMessages([
                'parameter' => 'No se pudo crear la regla. Intenta más tarde.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //if(Auth::user()->hasPermissionTo('delete rules')) {
            $rule = Rule::find($request['id']);
            if ($rule) {
                if ($rule->delete()) {
                    return response()->json([
                        'message' => 'rule deleted successfully',
                        'code' => '200',
                    ]);
                }
            }
            return response()->json([
                'message' => 'We couldt delete the rule',
                'code' => '400',
            ]);
        //}
    }
}
