<?php

namespace aBillander\Installer\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Configuration;
use App\Company;
use App\Warehouse;
use App\User;
use App\Tax;
use App\MeasureUnit;

class FinalController extends Controller
{
    /**
     * Display the installer finish page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Set some sensible defaults!

        $company = Company::with('address')->first();

        Configuration::updateValue('DEF_COMPANY', $company->id);

        Configuration::updateValue('DEF_COUNTRY', $company->address->country_id);

        Configuration::updateValue('DEF_CURRENCY',  $company->currency_id);

        Configuration::updateValue('DEF_LANGUAGE', User::first()->id);

        Configuration::updateValue('DEF_TAX', Tax::first()->id);

        if ( Warehouse::count() > 0 ) Configuration::updateValue('DEF_WAREHOUSE', Warehouse::first()->id);

        // Default Measure Unit

		$data = [
			'type' => 'Quantity', 
			'sign' => __('installer::main.initial_data.measure_unit.sign'), 
			'name' => __('installer::main.initial_data.measure_unit.name'), 
            'decimalPlaces' => 0, 
            'conversion_rate' => 1.0,
            'active' => 1,
        ];

        $munit = MeasureUnit::create( $data );

        Configuration::updateValue('DEF_MEASURE_UNIT_FOR_PRODUCTS', $munit->id);
       	Configuration::updateValue('DEF_MEASURE_UNIT_FOR_BOMS'    , $munit->id);




        return view('installer::done');
    }

}
