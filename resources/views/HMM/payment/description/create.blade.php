@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Description</strong></i></h3>

    <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
        id="save"><strong>Save</strong></button>
    <a href="{{ route('payment.description.index') }}" class="btn btn-sm btn-light text-uppercase"
        style="width: 10rem;height: 30px;"><strong>Discard</strong></a>

    <hr>

    <div class="card p-3">
        <div class="card-content">
            <h4 class="mb-3"><strong>New Description</strong></h4>
        </div>
        <div class="row mt-4 mb-4">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-6 mb-3">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Title: </label>
                    <div class="input-gp w-100">
                        <input type="text" name="title" id="" class="form-control" style="height: 30px;"
                            placeholder="Enter title">
                        <small class="text-danger" id="error-title"></small>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Unit: </label>
                    <div class="input-gp w-100">
                        <input type="text" name="units" id="" class="form-control" style="height: 30px;"
                            placeholder="Enter Unit">
                        <small class="text-danger" id="error-units"></small>
                    </div>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Cost: </label>
                    <div class="input-gp w-100">
                        <input type="text" name="cost" id="" class="form-control" style="height: 30px;"
                            placeholder="Enter Cost">
                        <small class="text-danger ml-4" id="error-cost"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const titleInput = $('input[name="title"]');
        const unitInput = $('input[name="units"]');
        const costInput = $('input[name="cost"]');

        titleInput.on('focus', function() {
            $(this).removeClass('form-control border border-danger');
            $(this).addClass('form-control');
            $('#error-title').text("");
        });

        unitInput.on('focus', function() {
            $(this).removeClass('form-control border border-danger');
            $(this).addClass('form-control');
            $('#error-units').text("");
        });

        costInput.on('focus', function() {
            $(this).removeClass('form-control border border-danger');
            $(this).addClass('form-control');
            $('#error-cost').text("");
        });

        $('#save').on('click', function() {
            let title = titleInput.val();
            let units = unitInput.val();
            let cost = costInput.val();
            let _token = $('input[name="_token"]').val();

            let data = {
                _token: _token,
                "title": title,
                "units": units,
                "cost": cost,
            };
            // console.log(data);
            $.ajax({
                type: "POST",
                url: "/hmm-group/payment/description",
                data: data,
                success: function(response) {
                    if (response.status == 201) {
                        window.location.href = '/hmm-group/payment/description';
                    }
                },
                error: function(response) {
                    let data = response.responseJSON.errors;

                    if (data.hasOwnProperty('title')) {
                        titleInput.addClass('form-control border border-danger');
                        $('#error-title').text(response.responseJSON.errors.title);
                    }
                    if (data.hasOwnProperty('units')) {
                        unitInput.addClass('form-control border border-danger');
                        $('#error-units').text(response.responseJSON.errors.units);
                    }
                    if (data.hasOwnProperty('cost')) {
                        costInput.addClass('form-control border border-danger');
                        $('#error-cost').text(response.responseJSON.errors.cost);
                    }
                }
            });
        });
    </script>
@endsection
