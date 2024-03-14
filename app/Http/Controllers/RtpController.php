<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RtpController extends Controller
{

    public function index()
    {
        return view('rtpslot_page', ['provider' => getProvider()]);
    }

    public function providerRtp(Request $request, $provider) {
        $q = $request->q;
        $rtp = getRtp();

        if ($provider == "all") {
            $rtp = $rtp->when($q, fn($e) => $e->filter(fn($f) => Str::contains($f->name, $q)))->groupBy("provider")->map(function($e) {
                $dt = collect($e);
                $noIndex = $dt->where("index", 0)->values();
                $index = $dt->where("index", ">", 0)->sortBy("index")->values();
                $dt = $index->merge($noIndex);
                return $dt->take(30);
            })->values()->collapse();
        }else{
            $rtp = $rtp->where("provider", $provider)->when($q, fn($e) => $e->filter(fn($f) => Str::contains($f->name, $q)))->values();
        }

        $noIndex = $rtp->where("index", 0)->values();
        $index = $rtp->where("index", ">", 0)->sortBy("index")->values();

        $rtp = $index->merge($noIndex);

        return response()->json($rtp, 200);
    }

    public function datatable() {
        $rtp = getRtp();

        $rtpNoIndex = $rtp->where("index", 0);
        $rtpIndex = $rtp->where("index", ">", 0)->sortBy("index")->values();

        $rtp = $rtpIndex->merge($rtpNoIndex);

        return datatables()->of($rtp)
        ->addColumn('action', function($data) {
            $btnDelete = '
                <button type="button" class="text-center btn btn-danger btn-sm delete me-3" data-id="'.$data->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                    <i class="p-0 fa-solid fa-trash-can"></i>
                </button>
            ';
            $btnEdit = '
                <button type="button" class="text-center btn btn-primary btn-sm edit me-3" data-id="'.$data->id.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="p-0 fa-solid fa-pen-to-square"></i>
                </button>
            ';

            return '<div class="d-flex align-items-center justify-content-center">'.$btnEdit.$btnDelete.'</div>';

        })
        ->rawColumns(['action', 'pola'])
        ->make(true);
    }

    public function insert(Request $request) {
        $validator = Validator::make($request->all(), [
            "provider" => "required",
            "name" => "required",
            "url" => "required",
            "urutan" => "required",
            "pola" => "required",
            "persen" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $path = $request->file('image')->storeAs('public', time().'_'. $request->name.".".$request->file('image')->getClientOriginalExtension());
        $path = url('storage'.str_replace("public", "", $path));

        $storeData = [
            "id" => Str::uuid(),
            "image" => $path,
            "provider" => $request->provider,
            "pola" => $request->pola,
            "persentase" => $request->persen,
            "url" => $request->url,
            "name" => $request->name,
            "index" => $request->urutan,
        ];

        $rtp = getRtp()->merge([$storeData]);

        $data = json_encode($rtp, JSON_PRETTY_PRINT);
        Storage::put("json/data_rtp.json", $data);

        return response()->json(["status" => true], 200);
    }

    public function edit()
    {
        $data = json_decode(File::get(database_path('json/data_rtp.json')), true);
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "provider" => "required",
            "name" => "required",
            "url" => "required",
            "urutan" => "required",
            "pola" => "required",
            "persen" => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 400);

        $rtps = getRtp();
        $index = $rtps->search(fn($e) => $e->id == $id);
        $rtp = $rtps[$index];

        if ($request->hasFile('image')) {
            $name = Str::of($rtp->image)->split('/\//')->last();
            Storage::delete("public/$name");
            $path = $request->file('image')->storeAs('public', time().'_'. $request->name.".".$request->file('image')->getClientOriginalExtension());
            $path = url('storage'.str_replace("public", "", $path));

            $rtp->image = $path;
        }

        $rtp->provider = $request->provider;
        $rtp->name = $request->name;
        $rtp->url = $request->url;
        $rtp->index = $request->urutan;
        $rtp->persentase = $request->persen;
        $rtp->pola = $request->pola;

        $rtps[$index] = $rtp;


        $data = json_encode($rtps, JSON_PRETTY_PRINT);
        Storage::put("json/data_rtp.json", $data);

        return response()->json(["status" => true], 200);
    }

    public function delete(Request $request, $id) {
        $rtps = getRtp();
        $rtp = $rtps->where("id", $id)->first();

        $name = Str::of($rtp->image)->split('/\//')->last();
        Storage::delete("public/$name");

        $rtps = $rtps->filter(fn($e) => $e->id != $id);
        $data = json_encode($rtps, JSON_PRETTY_PRINT);
        Storage::put("json/data_rtp.json", $data);
        return response()->json(["status" => true], 200);
    }

    public function randomAll() {
        $data = getRtp()->map(function($e) {
            $e->persentase = rand(30, 100);
            $e->pola = randomRtp();
            return $e;
        });

        $data = json_encode($data, JSON_PRETTY_PRINT);
        Storage::put("json/data_rtp.json", $data);
        return response()->json(["status" => true], 200);
    }
}
