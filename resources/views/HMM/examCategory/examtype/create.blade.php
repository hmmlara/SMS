@extends('HMM.layouts.app')

@section('content')


<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Trainers Create</strong> Dashboard</h1>

		<div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{route('exam.examtype.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
			<div class="col-12 col-lg-12 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">

						<h5 class="card-title mb-0">Adding ExameType</h5>
					</div>
					<div class="card-body">
                        <form action="{{ route('exam.examtype.store')}}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ old('name')}}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>


	</div>
</main>

@endsection
