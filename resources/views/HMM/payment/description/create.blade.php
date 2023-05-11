@extends('HMM.layouts.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Description</strong></h1>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <a href="{{ route('payment.description.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Description</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('payment.description.store') }}" method="post">
                                @csrf
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="title" id="" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Units</label>
                                        <input type="text" name="units" id="" class="form-control">
                                        @error('units')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Cost</label>
                                        <input type="text" name="cost" id="" class="form-control">
                                        @error('cost')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <button class="btn btn-success">Add Description</button>
                                    </div>
                                </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
