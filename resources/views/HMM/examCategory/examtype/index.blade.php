@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Exam Type</strong></i></h3>

    <div class="row">
        <div class="col-8">
            <a class="btn btn-sm btn-success text-uppercase" href="{{route('exam.examtype.create')}}"
                style="width: 10rem;height: 30px;"><strong>Exam Type Create</strong></a>
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
                        <button class="btn btn-sm shadow-none dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- loop data  --}}
    <div class="row">
        @foreach ($examtypes as $examtype)
            <div class="col-4">
                <a href="{{ route('exam.examtype.edit', $examtype->id) }}" class="text-decoration-none text-dark">
                    <div class="card p-4 mb-3">
                        <div class="card-content px-3">
                            <h4 class="">{{ $examtype->name }}</h4>
                            <form action="{{ route('exam.examtype.destroy',$examtype->id)}}" method="post" onsubmit="return confirm('Are you sure to delete')">
                                @csrf
                                @method('delete')
                                <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-light-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
    {{-- loop data --}}

@endsection
