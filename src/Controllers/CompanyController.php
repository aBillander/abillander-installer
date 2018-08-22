<?php

namespace aBillander\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Company;
use App\Warehouse;
use App\Address;
use App\User;
use App\Configuration;

class CompanyController extends Controller
{
    protected $company;
    protected $warehouse;
    protected $address;
    protected $user;

    public function __construct(Company $company, Warehouse $warehouse, Address $address, User $user)
    {
        $this->company = $company;
        $this->warehouse = $warehouse;
        $this->address = $address;
        $this->user = $user;
    }

    /**
     * Display the installer company page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('installer::company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create Company
        $request->validate($this->company::$rules);
        $request->validate($this->address::related_rules());
        $request->validate([
            'user.email' => 'required|email',
            'user.password' => 'required|min:2|max:32|confirmed',
        ]);

        $request->merge(['notes' => $request->input('address.notes'), 'name_commercial' => $request->input('address.name_commercial')]);

        $company = $this->company->create($request->all());

        $data = $request->input('address');

        $address = $this->address->create($data);
        $company->addresses()->save($address);

        // Create Warehouse (guess it is the same address...)
        $warehouse = $this->warehouse->create( $request->all() );

        $address = $this->address->create($data);
        $warehouse->addresses()->save($address);

        // Create admin
        $userData = $request->input('user');

        $language = \App\Language::where('iso_code', App::getLocale())->first();
        if (!$language) {
            $language = \App\Language::first();
        }

        $userData['language_id'] = $language->id;
        $userData['password'] = \Hash::make($request->input('user.password'));
        $userData['is_admin'] = 1;
        $userData['active'] = 1;

        $user = $this->user->create($userData);

        // Gorrino update; Needs future refactoring
        $company->language_id = $user->language_id;
        $company->save();

        return redirect()->route('installer::done')->with('install-finished');
    }

}
