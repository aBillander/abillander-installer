<?php

namespace aBillander\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Company;
use App\Address;
use App\User;
use App\Configuration;

class CompanyController extends Controller
{
    protected $company;
    protected $address;
    protected $user;

    public function __construct(Company $company, Address $address, User $user)
    {
        $this->company = $company;
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

        return redirect()->route('installer::done')->with('install-finished');
    }

}
