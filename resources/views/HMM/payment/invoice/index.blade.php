@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Invoice</strong></i></h3>

    <div class="row">
        <div class="col-8">
            <a href="{{ route('payment.invoice.create') }}" class="btn btn-sm btn-success text-uppercase"
                style="width: 10rem;height: 30px;"><strong>create</strong></a>
        </div>

        <div class="col-4">
            <div class="">
                <form action="" method="post">
                    <input type="text" name="search" id="" class="form-control search" placeholder="Search"
                        style="height: 30px">
                </form>
            </div>
            <div class="row mt-2">
                <div class="col-9">
                    <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-filter"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-dark" href="#">Action</a>
                            <a class="dropdown-item text-dark" href="#">Another action</a>
                            <a class="dropdown-item text-dark" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn btn-sm"><i class="fa fa-th-large"></i></button>
                    <button class="btn btn-sm"><i class="fa fa-list"></i></button>
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection
