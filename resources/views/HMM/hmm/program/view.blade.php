@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Program</strong></i></h3>

    <div class="btn-container">
        <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-edit"><strong>Edit</strong></button>
    </div>
    <hr>

    <div class="card p-3">
        <div class="card-content">
            <div class="d-flex justify-content-between">
                <h4 class=""><strong>New Program</strong></h4>
                <form action="{{ route('hmm.program.destroy', $program->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
            <div class="row mt-4 mb-3">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Title: </label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $program->id }}">

                    <div class="input-gp w-100">
                        <input type="text" name="name" id="" class="form-control w-50" style="height: 30px;"
                            placeholder="Enter program name" value="{{ $program->name }}" disabled>
                        <small class="text-danger" id="error-msg"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let name = $('input[name="name"]').val();

        // console.log(title);
        $('input[name="name"]').on('focus', function() {
            $('input[name="name"]').removeClass('form-control border border-danger');
            $(this).addClass('form-control');
            $('#error-msg').text("");
        });

        // change after click edit button
        $(document).on('click', '#des-edit', function() {
            let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-update"><strong>Update</strong></button>
            <button class="btn btn-sm btn-light text-uppercase" style="width: 10rem;height: 30px;"
            id="des-discard"><strong>Discard</strong></button>`;

            $('.btn-container').html(component);

            $('input[name="name"]').prop('disabled', false);

        });

        $(document).on('click', '#des-discard', function() {

            let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-edit"><strong>Edit</strong></button>`;

            $('.btn-container').html(component);

            $('input[name="name"]').prop('disabled', true);

            $('input[name="name"]').removeClass('form-control border border-danger');
            $('input[name="name"]').addClass('form-control');

            if ($('input[name="name"]').val() == '') {
                $('input[name="name"]').val(name);
            }

            $('#error-msg').text("");

        });

        $(document).on('click', '#des-update', function() {
            let name = $('input[name="name"]').val();
            let _token = $('input[name="_token"]').val();
            let id = $('input[name = "id"]').val();

            let data = {
                _token: _token,
                _method: 'PUT',
                "name": name
            };
            // console.log(data);
            $.ajax({
                type: "POST",
                url: `/hmm-group/hmm/program/${id}`,
                data: data,
                success: function(response) {
                    console.log(response);
                    if (response.status == 204) {
                        $('input[name="name"]').prop('disabled', true);
                        let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
                                            id="des-edit"><strong>Edit</strong></button>`;

                        $('.btn-container').html(component);
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
