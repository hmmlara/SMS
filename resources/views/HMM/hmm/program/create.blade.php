@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Program</strong></i></h3>

    <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
        id="save"><strong>Save</strong></button>
    <a href="{{ route('hmm.program.index') }}" class="btn btn-sm btn-light text-uppercase"
        style="width: 10rem;height: 30px;"><strong>Discard</strong></a>

    <hr>

    <div class="card p-3">
        <div class="card-content">
            <h4 class="mb-3"><strong>New Program</strong></h4>
        </div>
        <div class="row">
            <div class="form-group d-flex">
                <label for="" class="form-label me-2">Title: </label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-gp w-100">
                    <input type="text" name="name" id="" class="form-control w-50" style="height: 30px;"
                        placeholder="Enter program title">
                    <small class="text-danger" id="error-msg"></small>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('input[name="name"]').on('focus',function(){
            $('input[name="name"]').removeClass('form-control border border-danger');
            $(this).addClass('form-control');
            $('#error-msg').text("");
        });

        $('#save').on('click', function() {
            let name  = $('input[name="name"]').val();
            let _token = $('input[name="_token"]').val();

            let data = {
                _token: _token,
                "name": name
            };
            // console.log(data);
            $.ajax({
                type: "POST",
                url: "/hmm-group/hmm/program",
                data: data,
                success: function(response) {
                    if (response.status == 201) {
                        window.location.href = '/hmm-group/hmm/program';
                    }
                },
                error: function(response) {
                    $('input[name="name"]').addClass('form-control border border-danger');
                    $('#error-msg').text(response.responseJSON.errors.name);
                }
            });
        });
    </script>
@endsection
