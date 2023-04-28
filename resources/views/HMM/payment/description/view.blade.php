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
            <div class="row mt-4 mb-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $description->id }}">
                <div class="col-6 mb-3">
                    <div class="form-group d-flex">
                        <label for="" class="form-label me-2">Title: </label>

                        <div class="input-gp w-100">
                            <input type="text" name="title" id="" class="form-control" style="height: 30px;"
                                placeholder="Enter title" value="{{ $description->title }}" disabled>
                            <small class="text-danger" id="error-title"></small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group d-flex">
                        <label for="" class="form-label me-2">Unit: </label>

                        <div class="input-gp w-100">
                            <input type="text" name="units" id="" class="form-control" style="height: 30px;"
                                placeholder="Enter Unit" value="{{ $description->units }}" disabled>
                            <small class="text-danger" id="error-units"></small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="form-group d-flex">
                        <label for="" class="form-label me-2">Cost: </label>

                        <div class="input-gp w-100">
                            <input type="text" name="cost" id="" class="form-control" style="height: 30px;"
                                placeholder="Enter Cost" value="{{ $description->cost }}" disabled>
                            <small class="text-danger" id="error-cost"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // getting component
            const titleInput = $('input[name="title"]');
            const unitInput = $('input[name="units"]');
            const costInput = $('input[name="cost"]');

            // old data
            const oldTitle = titleInput.val();
            const oldUnits = unitInput.val();
            const oldCost = costInput.val();

            // console.log(title);
            titleInput.on('focus', function() {
                $(this).removeClass('form-control border border-danger');
                $(this).addClass('form-control');
                $('#error-msg').text("");
            });

            unitInput.on('focus', function() {
                $(this).removeClass('form-control border border-danger');
                $(this).addClass('form-control');
                $('#error-msg').text("");
            });

            costInput.on('focus', function() {
                $(this).removeClass('form-control border border-danger');
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

                // disable input
                titleInput.prop('disabled', false);
                unitInput.prop('disabled', false);
                costInput.prop('disabled', false);
            });

            $(document).on('click', '#des-discard', function() {

                let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
            id="des-edit"><strong>Edit</strong></button>`;

                $('.btn-container').html(component);

                titleInput.prop('disabled', true);
                titleInput.removeClass('form-control border border-danger');
                titleInput.addClass('form-control');

                unitInput.prop('disabled', true);
                unitInput.removeClass('form-control border border-danger');
                unitInput.addClass('form-control');

                costInput.prop('disabled', true);
                costInput.removeClass('form-control border border-danger');
                costInput.addClass('form-control');

                if (titleInput.val() == '' || titleInput.val() != oldTitle) {
                    titleInput.val(oldTitle);
                }

                if (unitInput.val() == '' || unitInput.val() != oldUnits) {
                    unitInput.val(oldUnits);
                }

                if (costInput.val() == '' || costInput.val() != oldCost) {
                    costInput.val(oldCost);
                }

                $('#error-title').text("");
                $('#error-units').text("");
                $('#error-cost').text("");

            });

            $(document).on('click', '#des-update', function() {
                let title = titleInput.val();
                let units = unitInput.val();
                let cost = costInput.val();
                let _token = $('input[name="_token"]').val();
                let id = $('input[name = "id"]').val();

                let data = {
                    _token: _token,
                    _method: 'PUT',
                    "title": title,
                    "units": units,
                    "cost": cost,
                };
                // console.log(data);
                $.ajax({
                    type: "POST",
                    url: `/hmm-group/payment/description/${id}`,
                    data: data,
                    success: function(response) {
                        console.log(response);
                        if (response.status == 204) {
                            titleInput.prop('disabled', true);
                            unitInput.prop('disabled', true);
                            costInput.prop('disabled', true);

                            let component = `<button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
                                            id="des-edit"><strong>Edit</strong></button>`;

                            $('.btn-container').html(component);
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
