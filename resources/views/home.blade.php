@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vat Calculatro</div>
                <div class="card-body">
                    <form action="{{ route('vat.calculator') }}" method="POST" >
                      @csrf
                      <form>
                        <div class="form-group row">
                          <label for="Amount" class="col-sm-2 col-form-label">Amount</label>
                          <div class="col-sm-10">
                            <input type="number" min="0" class="form-control" id="Amount" placeholder="Amount" name="amount">
                            @error('amount')
                              <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <fieldset class="form-group">
                          <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Operation</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="operation" id="gridRadios1" value="include" checked>
                                <label class="form-check-label" for="gridRadios1">
                                  Include Vat
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="operation" id="gridRadios2" value="exclude">
                                <label class="form-check-label" for="gridRadios2">
                                  Exclude Vat
                                </label>
                              </div>
                            </div>
                            @error('Operation')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="vat" class="col-sm-2 col-form-label">Vat.% (defult=15%)</label>
                            <div class="col-sm-10">
                              <input type="number" min="0" class="form-control" id="vat" placeholder="0.0% " name="vat">
                            </div>
                          </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Calculate</button>
                          </div>
                        </div>
                      </form>
                    </form>


                    <div class="row">
                        <strong>Result:</strong><br/><hr/>
                        <p class="col">Amount: {{ $Amount ?? 00.00 }}</p>
                        <p class="col">Operation: {{ $operation ?? 00.00 }}</p>
                        <p class="col">Tax Percentage: {{ $taxPercentage ?? 00 }}%</p>
                        <p class="col">VAT Amount: {{ $vat_amount ?? 00.00 }}</p>
                        <p class="col">Net Sum: {{ $netSum ?? 00.00 }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
