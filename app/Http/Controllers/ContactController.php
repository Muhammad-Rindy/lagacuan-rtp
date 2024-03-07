<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index_contact()
    {

        if(request()->ajax()) {
            return datatables()->of(Contact::select('*'))
            ->addColumn('action', 'dashboards.contact.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('dashboards.contact.index');

    }




    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function store_contact(Request $request)
    {
        $request->validate([
            'number_wa' => 'required',
            'number_tele' => 'required',
            'live_chat' => 'required',
            'link_apk' => 'required',
        ]);


        $bukti = Contact::create([
            'number_wa' => $request->number_wa,
            'number_tele' => $request->number_tele,
            'live_chat' => $request->live_chat,
            'link_apk' => $request->link_apk,
        ]);

        return response()->json(['success' => true, 'message' => 'Data stored successfully', 'bukti' => $bukti]);
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function getData($id) {
        $product = Contact::find($id);
        return response()->json($product);
    }

    public function updateData(Request $request)
    {
        $request->all();

        $product = Contact::findOrFail($request->id);
        $product->update([
            'number_wa' => $request->number_wa,
            'number_tele' => $request->number_tele,
            'live_chat' => $request->live_chat,
            'link_apk' => $request->link_apk,
        ]);
        return response()->json(['success' => true]);
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy_contact(Request $request)
    {
        $product = Contact::where('id', $request->id)->delete();

        return Response()->json($product);
    }
}