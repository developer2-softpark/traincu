<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\CompanyType;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.company.index', [
            "companies" => User::role('company')->with("company")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.company.create', [
            "companyTypes" => CompanyType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "mobile_no" => "required|string|max:25",
            "password" => "required|string|min:8|max:25|confirmed",
            "image" => "nullable|file",
            "address" => "required|string",
            "account_name" => "required|string|unique:company_details,account_name",
            'company_type_id' => "exists:company_types,id",
        ]);
        $user = [
            "name" => $request->name,
            "email" => $request->email,
            "mobile_no" => $request->mobile_no,
            "password" => bcrypt($request->password),
        ];
        $user = new User($user);
        if ($user->save()) {
            if ($request->hasFile('image')) {
                $image = Storage::disk("local")->put("images\\company", $request->image);
            }
            $userDetails = [
                "uuid" => $user->id + 10000,
                "address" => $request->address ?: "",
                "image" => $image ?: "",
                "account_name" => $request->account_name,
                "company_type_id" => $request->company_type_id,
            ];


            if ($user->company()->save(new CompanyDetail($userDetails))) {
                $user->assignRole("company");
                Toastr::success('Successfully company Added', "Success");
            } else {
                $user->delete();
                Toastr::error('Something Went Wrong!', "Error");
            }
        } else {
            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("admin.pages.company.show", [
            "user" => $user,
            "route" => url()->previous() == route("admin.trucks.index") ? "admin.trucks.index" : "admin.user.company.index",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.pages.company.edit', [
            "user" => $user,
            "companyTypes" => CompanyType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $user->id,
            "mobile_no" => "required|string|max:25",
            "image" => "nullable|file",
            "address" => "required|string",
            "account_name" => "required|string|unique:company_details,account_name," . $user->company->id,
        ]);
        $userData = [
            "name" => $request->name,
            "email" => $request->email,
            "mobile_no" => $request->mobile_no,
        ];
        $user->fill($userData);

        if ($user->save()) {
            $userDetails = [
                "address" => $request->address ?: "",
                "account_name" => $request->account_name,
                "company_type_id" => $request->company_type_id,
            ];
            if ($request->hasFile('image')) {
                if (Storage::disk("local")->exists($user->company->image)) {
                    Storage::disk("local")->delete($user->company->image);
                }
                $userDetails['image'] = Storage::disk("local")->put("images\\company", $request->image);
            }

            if ($user->company()->update($userDetails)) {
                $user->assignRole("company");
                Toastr::success('Successfully company Added', "Success");
            } else {

                Toastr::error('Something Went Wrong!', "Error");
            }
        } else {

            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Storage::disk("local")->exists($user->company->image)) {
            Storage::disk("local")->delete($user->company->image);
        }
        if ($user->company()->delete() && $user->delete()) {
            Toastr::success('Successfully company Deleted', "Success");
        } else {

            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }

    public function changePassword(Request $request, User $user)
    {
        $this->validate($request, [
            "password" => "required|confirmed",
        ]);
        $password = [
            "password" => bcrypt($request->password),
        ];
        $user->fill($password);
        if ($user->save()) {
            Toastr::success('Successfully Password Changed', "Success");
        } else {

            Toastr::error('Something Went Wrong!', "Error");
        }
        return redirect()->back();
    }
}
