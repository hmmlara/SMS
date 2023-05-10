{{-- @extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Academic Year</strong></i></h3>

    <div class="btn-container">
        <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-edit"><strong>Edit</strong></button>
    </div>
    <hr>

    <div class="card p-3">
        <div class="card-content">
            <div class="d-flex justify-content-between">
                <h4 class=""><strong>New Academic Year</strong></h4>
                <form action="{{ route('hmm.academic.destroy', $academic->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
            <div class="row mt-4 mb-3">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Academic Year: </label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $academic->id }}">

                    <div class="input-gp w-200">
                        <input type="text" name="name" id="" class="form-control w-50" style="height: 30px;"
                            placeholder="Enter program name" value="{{ $academic->name }}" disabled>
                        <small class="text-danger" id="error-msg"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('HMM.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Academic</strong> Year</h1>

        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{route('hmm.academic.index')}}" class="btn btn-success">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Academic Year</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hmm.academic.update', $academic->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row my-3">
                                <div class="col-md-12">                                    
                                    <label for="" class="form-label">Academic Year</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ $academic->name }}">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                                                                        
                                    <div class="row my-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-success">Update</button>
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
