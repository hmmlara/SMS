@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Program</strong></i></h3>

    <div class="row">
        <div class="col-8">
            <a href="{{ route('hmm.program.create') }}" class="btn btn-sm btn-success text-uppercase"
                style="width: 10rem;height: 30px;"><strong>create</strong></a>
        </div>

        <div class="col-4">
            <div class="">
                <form action="" method="post">
                    <input type="text" name="search" id="" class="form-control search" placeholder="Search"
                        style="height: 30px">
                </form>
            </div>
        </div>
    </div>

    <hr>

    {{-- loop data  --}}
    <div class="row">
        @foreach ($programs as $program)
            <div class="col-4">
                <a href="{{ route('hmm.program.edit', $program->id) }}" class="text-decoration-none text-dark">
                    <div class="card p-4 mb-3">
                        <div class="card-content px-3">
                            <h4 class="">{{ $program->name }}</h4>
                            <form action="{{ route('hmm.program.destroy', $program->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt"></i></button>
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


