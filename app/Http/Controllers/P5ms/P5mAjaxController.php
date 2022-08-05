<?php

namespace App\Http\Controllers\p5ms\Ajax;

use App\P5m;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class P5mAjaxController extends Controller
{
    public function store(Request $request)
    {
        $p5ms = new P5m();
        $p5ms->id_lokasi= $request->id_lokasi;
        $p5ms->id_departemen = $request->id_departemen;
        $p5ms->hari = $request->hari;
        $p5ms->tanggal = date_format(date_create($request->tanggal),"d-m-Y");
        $p5ms->id_shift = $request->id_shift;
        $p5ms->materi = $request->materi;
        $p5ms->created_date = date_format(date_create($request->created_date),"d-m-Y");
        $p5ms->updated_date = date_format(date_create($request->updated_date),"d-m-Y");
        $p5ms->save();

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $p5ms], 200);
    }

    public function show($id)
    {
        $P5m = P5m::findOrFail($id);

        $data = [
            'school_operational_assistance_id' => $P5m->school_operational_assistance->name,
            'departemen_id' => $P5m->departemen->name,
            'item_code' => $P5m->item_code,
            'name' => $P5m->name,
            'nrp' => $P5m->nrp,
            'material' => $P5m->material,
            // $P5m->date_of_purchase
            'date_of_purchase' => $P5m->date_of_purchase,
            'condition' => $P5m->condition,
            'quantity' => $P5m->quantity,
            'price' => $P5m->indonesian_currency($P5m->price),
            'price_per_item' => $P5m->indonesian_currency($P5m->price_per_item),
            'note' => $P5m->note,
        ];

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data], 200);
    }

    public function edit($id)
    {
        $P5m = P5m::findOrFail($id);

        $data = [
            'school_operational_assistance_id' => $P5m->school_operational_assistance_id,
            'departemen_id' => $P5m->departemen_id,
            'item_code' => $P5m->item_code,
            'name' => $P5m->name,
            'nrp' => $P5m->nrp,
            'material' => $P5m->material,
            'date_of_purchase' => date_format(date_create($P5m->date_of_purchase),"Y-m-d"),
            'condition' => $P5m->condition,
            'quantity' => $P5m->quantity,
            'price' => $P5m->price,
            'price_per_item' => $P5m->price_per_item,
            'note' => $P5m->note,
        ];

        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data], 200);
    }

    public function update(Request $request, $id)
    {
        $p5ms = P5m::findOrFail($id);

        $p5ms->school_operational_assistance_id = $request->school_operational_assistance_id;
        $p5ms->departemen_id = $request->departemen_id;
        $p5ms->item_code = $request->item_code;
        $p5ms->name = $request->name;
        $p5ms->nrp = $request->nrp;
        $p5ms->material = $request->material;
        $p5ms->date_of_purchase = date_format(date_create($request->date_of_purchase),"d-m-Y");
        $p5ms->condition = $request->condition;
        $p5ms->quantity = $request->quantity;
        $p5ms->price = $request->price;
        $p5ms->price_per_item = $request->price_per_item;
        $p5ms->note = $request->note;
        $p5ms->save();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }

    public function destroy($id)
    {
        P5m::findOrFail($id)->delete();

        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
