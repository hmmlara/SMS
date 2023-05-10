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
                        <form action="{{route('hmm.academic.store')}}" method="post">
                            @csrf
                            <div class="row my-3">
                                <div class="col-md-12">                                    
                                    <label for="" class="form-label">Academic Year</label>
                                    <input type="text" name="name" id="" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                                                                        
                                    <div class="row my-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-success">Add Academic Year</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            

        {{-- <div class="row">
            <div class="col md-12">
                {{$courses->links('pagination::bootstrap-4')}}
            </div>
        </div> --}}
</main>

@endsection
