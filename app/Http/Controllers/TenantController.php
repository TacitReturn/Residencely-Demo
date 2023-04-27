<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $user = auth()->user()->id;

        $tenants = Tenant::orderBy('created_at', 'DESC')->where("user_id", $user)->get();

        return view('tenants.index', ['tenants' => $tenants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $properties = Property::all();
        return view("tenants.create")->with("properties", $properties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTenantRequest  $request
     * @return Response
     */
    public function store(StoreTenantRequest $request)
    {
        $user_id = Auth::id();
        $request["user_id"] = Auth::id();
        $request["property_id"] = 11;
//        dump($request->all());
        Tenant::create($request->all());
//
//        Tenant::create($request->validated());

//        $tenant = Tenant::create([
//            "first_name" => $request->first_name,
//            "last_name" => $request->last_name,
//            "user_id" => $user_id,
//            "property_id" => $request->property
//        ]);

//        dump($tenant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTenantRequest  $request
     * @param  \App\Models\Tenant  $tenant
     * @return Response
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
