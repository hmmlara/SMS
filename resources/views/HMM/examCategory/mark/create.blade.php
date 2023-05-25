@extends('HMM.layouts.app')

@section('content')


<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Mark Create</strong> Dashboard</h1>

		<div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{route('exam.mark.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row">
			<div class="col-12 col-lg-12 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">

						<h5 class="card-title mb-0">Adding Mark</h5>
					</div>
					<div class="card-body">
                        <form action="{{ route('exam.mark.store')}}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Student</label>
                                    <select name="student_personal_id" id="" class="form-select w-50">
                                        <option value="">Choose Student</option>
                                        @foreach ($students as $student)
                                            <option value="">{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('student_personal_id')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Exam</label>
                                    <select name="exam_id" id="" class="form-select w-50">
                                        <option value="">Choose Exam</option>
                                        @foreach ($exams as $exam)
                                            <option value="">
                                                @if ($exam->exam_type_id)
                                                {{-- {{$exam->exam_type_id}} --}}
                                                    <?php $exam = \App\Models\Exam::find($exam->exam_type_id); echo $exam;?>
                                                    @if ($exam)
                                                        Exam Name: {{ $exam->examtype->name }}
                                                    @endif
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('exam_id')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Mark</label>
                                    <input type="text" name="mark" id="" class="form-control" value="{{ old('mark')}}">
                                    <span class="text-danger">
                                        @error('mark')
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
