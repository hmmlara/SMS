@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Invoice</strong></i></h3>

    <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"><strong>Save</strong></button>
    <a href="{{ route('payment.invoice.index') }}" class="btn btn-sm btn-light text-uppercase" style="width: 10rem;height: 30px;"><strong>Discard</strong></a>

    <div class="mt-4 p-1" style="border: 1px solid #7e7e7e;border-left: none;border-right: none;">
        <button class="btn btn-sm btn-success text-uppercase" style="width: 5rem;height: 30px;">Print</button>

    </div>
@endsection
