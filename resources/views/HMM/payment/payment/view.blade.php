@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Description</strong></i></h3>

    <div class="btn-container">
        <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-edit"><strong>Edit</strong></button>
    </div>
    <hr>

    <div class="card p-3">
        <div class="card-content">
            <div class="d-flex justify-content-between">
                <h4 class=""><strong>New Description</strong></h4>
                <form action="{{ route('payment.description.destroy', $description->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
            <div class="row mt-4 mb-3">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Title: </label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $description->id }}">

                    <div class="input-gp w-100">
                        <input type="text" name="title" id="" class="form-control w-50" style="height: 30px;"
                            placeholder="Enter title" value="{{ $description->title }}" disabled>
                        <small class="text-danger" id="error-msg"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let title = $('input[name="title"]').val();

        // console.log(title);
        $('input[name="title"]').on('focus', function() {
            $('input[name="title"]').removeClass('form-control border border-danger');
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

            $('input[name="title"]').prop('disabled', false);

        });

        $(document).on('click', '#des-discard', function() {

            let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-edit"><strong>Edit</strong></button>`;

            $('.btn-container').html(component);

            $('input[name="title"]').prop('disabled', true);

            $('input[name="title"]').removeClass('form-control border border-danger');
            $('input[name="title"]').addClass('form-control');

            if ($('input[name="title"]').val() == '') {
                $('input[name="title"]').val(title);
            }

            $('#error-msg').text("");

        });

        $(document).on('click', '#des-update', function() {
            let title = $('input[name="title"]').val();
            let _token = $('input[name="_token"]').val();
            let id = $('input[name = "id"]').val();

            let data = {
                _token: _token,
                _method: 'PUT',
                "title": title
            };
            // console.log(data);
            $.ajax({
                type: "POST",
                url: `/hmm-group/payment/description/${id}`,
                data: data,
                success: function(response) {
                    console.log(response);
                    if (response.status == 204) {
                        $('input[name="title"]').prop('disabled', true);
                        let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
                                            id="des-edit"><strong>Edit</strong></button>`;

                        $('.btn-container').html(component);
                    }
                },
                error: function(response) {
                    $('input[name="title"]').addClass('form-control border border-danger');
                    $('#error-msg').text(response.responseJSON.errors.title);
                }
            });
        });
    </script>
@endsection
