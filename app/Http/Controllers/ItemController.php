<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Gate;
use App\Models\TokenRequirement;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Item::select(['title', 'type', 'creator_address', 'id', 'slug'])->with(['gate' => function ($q) {
            $q->select('contract_address','blockchain','creator','id','token_standard','item_id')->with(['tokenRequirements:token_id,amount_required,id,gate_id']);
        },])->get();
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

        $request->validate([
            'title' => 'required|unique:items|max:255',
            'type' => 'required',
            'creator_address' => 'required',
            'token_standard' => 'required',
            'blockchain' => 'required',
            'contract_address' => 'required'
        ]);


        $item = Item::updateOrCreate($request->all(['title', 'type', 'creator_address']));
        $gate_data = collect($request->all(['contract_address', 'token_standard', 'blockchain']))->toArray();
        $gate_data['creator'] = $request->creator_address;
        $gate_data['item_id'] = $item->id;

        $gate = Gate::updateOrCreate($gate_data);
        $token_data = collect($request->all(['token_id', 'amount_required']))->toArray();
        $token_data['gate_id'] = $gate->id;
        TokenRequirement::create($token_data);


        return $item->with(['gate' => function ($query) {
            return $query->select('contract_address','blockchain','creator','id','token_standard','item_id')->with(['tokenRequirements:token_id,amount_required,gate_id']);
        }])->firstOrFail();
    }

    /**
     * Display the specified resource.
     *
     * @param string  $item
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        //
        return Item::where('slug', $slug)->with(['creator' => function ($query) {
            $query->select(['id', 'address']);
        }, 'gate',])->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
