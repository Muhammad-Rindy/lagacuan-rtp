<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Domain;
use Illuminate\Validation\Rule;
use App\Jobs\DomainJobs;
use DataTables;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboards.domain");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json()
    {
        return DataTables::of(Domain::query())
            ->addColumn('action', function(Domain $domain) {
                return '
                    <a href="javascript:void(0)" class="h-auto btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary justify-content-end edit">
                        <i style="font-size: 19px; color:#006ae6" class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="javascript:void(0)" class="h-auto btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary justify-content-end delete">
                        <i style="font-size: 19px; color:#e42855; margin:0px 7px" class="fa-solid fa-trash"></i>
                    </a>
                ';
            })
            ->addIndexColumn()
            ->make(true);
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
            $validator = Validator::make($request->all(), [
                "domain" => "required|unique:domain",
            ]);

            if ($validator->fails()) return response()->json($validator->errors(), 400);

            Domain::create([
                "domain" => $request->domain,
                "redirect" => $request->redirect
            ]);

            if ($request->redirect) {
                DomainJobs::dispatch("redirect", $request->domain, $request->redirect);
            }else{
                DomainJobs::dispatch("domain", $request->domain);
            }

            return response()->json(["status" => true], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }
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
        try {
            $validator = Validator::make($request->all(), [
                "domain" => [
                    "required",
                    Rule::unique('domain')->ignore($id),
                ],
            ]);

            if ($validator->fails()) return response()->json($validator->errors(), 400);

            Domain::where('id', $id)->update([
                "domain" => $request->domain,
                "redirect" => $request->redirect
            ]);

            if ($request->redirect) {
                DomainJobs::dispatch("redirect", $request->domain, $request->redirect);
            }else{
                DomainJobs::dispatch("domain", $request->domain);
            }

            return response()->json(["status" => true], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $domain = Domain::find($id);
            $domain->delete();
            DomainJobs::dispatch("delete", $domain->domain);
            return response()->json(["status" => true], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }
    }
}
