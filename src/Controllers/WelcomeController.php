<?php

namespace aBillander\Installer\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the installer welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('installer::welcome');
    }

    /**
     * Set the installer language.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setLocale(Request $request)
    {
        $request->session()->put('installer.locale', $request->lang);

        return redirect()->route('installer::license');
    }

    /**
     * Display the installer license page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLicense()
    {
        return view('installer::license');
    }

    /**
     * Accept the license.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptLicense(Request $request)
    {
        $request->validate([
            'terms' => 'accepted',
        ]);

        return redirect()->route('installer::config');
    }

}
