<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function vatCalculator(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:0',
            'operation' => 'required',
        ]);

        $defult_vat = 15;//defult vat 15%

        $grossAmount  = $request->amount;
        $operation  = $request->operation;
        $taxPercentage   = $request->vat ??  $defult_vat;


        if ($operation == 'exclude') {
            // Calculate VAT excluding from gross sum
            $vat_amount = round((($grossAmount / (1 +($taxPercentage/100))) - $grossAmount)*-1,2);
            $netAmount = $grossAmount - $vat_amount;
        }else{
            // Calculate VAT including from gross sum
            $vat_amount = round($grossAmount * ($taxPercentage/100),2);
            $netAmount = $grossAmount + $vat_amount;
        }

        return view('home')->with([
            'Amount' => $grossAmount,
            'operation' => $operation,
            'taxPercentage' => $taxPercentage,
            'vat_amount' => $vat_amount,
            'netSum' => $netAmount,
        ]);


    }
}
