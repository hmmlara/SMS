@extends('HMM.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Program</strong></h1>

        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{route('hmm.program.index')}}" class="btn btn-success">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Program</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hmm.program.update', $program->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row my-3">
                                <div class="col-md-12">                                    
                                    <label for="" class="form-label">Program</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ $program->name }}">
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
