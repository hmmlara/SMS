@extends('HMM.layouts.app')

@section('content')
    <h3 class="mt-2"><i><strong>Payment</strong></i></h3>

    <button class="btn btn-sm btn-success text-uppercase" style="width: 10rem;height: 30px;"
        id="save"><strong>Save</strong></button>
    <a href="{{ route('payment.payment.index') }}" class="btn btn-sm btn-light text-uppercase"
        style="width: 10rem;height: 30px;"><strong>Discard</strong></a>

    <hr>

    <div class="card p-3">
        <div class="card-content">
            @php
                // create invoice number date_format(date_create(date('Y-m-d')), 'Ymd') . time()
                $inovice_no = date_format(date_create(date('Y-m-d')), 'Ymd') . time();
            @endphp
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-3">
                        <strong>
                            New Payment
                        </strong>
                    </h4>
                </div>
                <div class="col-6">
                    <p class="float-end">
                        <em>#Invoice No -
                            <span id="invoice_no">HMM{{ $inovice_no }}</span>
                        </em>
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-6 mb-4">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Student: </label>

                    <input type="text" name="student_personal_id" id="" class="form-control"
                        style="height: 30px;" placeholder="Enter Student">
                </div>
                <small class="text-danger" id="error-msg"></small>
            </div>
            <div class="col-6 mb-4">
                <div class="form-group d-flex">
                    <label for="" class="form-label me-2">Date: </label>

                    <input type="date" name="invoice_date" id="" class="form-control" style="height: 30px;"
                        placeholder="Enter Student">
                </div>
                <small class="text-danger" id="error-msg"></small>
            </div>
            <hr>
            <div class="col-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#description_modal">
                    <i class="fas fa-plus me-2"></i> Add description
                </button>

                <!-- Modal -->
                <div class="modal modal-lg fade" id="description_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Select Description</h5>
                                <button type="button" class="close btn btn-sm" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-sm" id="description_table">
                                    <thead>
                                        <th>Id</th>
                                        <th>Description</th>
                                        <th>Cost</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($descriptions as $key => $description)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td id="des_title">{{ $description->title }}</td>
                                                <td id="des_cost">{{ $description->cost }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-success" id="add_description">Add</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-sm">
                    <thead>
                        <th>No</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="payment_tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>

        // for datatable
        $(document).ready(function(){
            $('#description_table').DataTable({
                responsive: true,
            });
        });

        // add description
        $('#description_table').on('click','#add_description',function(){
            const table_no = $('#payment_tbody tr').length + 1;
            const tr = $(this).closest('tr');

            const title = tr.find('#des_title').text();
            const cost = tr.find('#des_cost').text();

            const component = `<tr>
                                    <td>${table_no}</td>
                                    <td>${title}</td>
                                    <td>1.0</td>
                                    <td>${cost}</td>
                                    <td>
                                        <button class="btn btn-sm" id="remove_description">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>`;

            $('#payment_tbody').append(component);
            $('#description_modal').modal('toggle');
        });

        // remove description
        $('#payment_tbody').on('click','#remove_description',function(){
            $(this).closest('tr').remove();
        });

        // remove border color and error text
        $('input[name="title"]').on('focus', function() {
            $('input[name="title"]').removeClass('form-control border border-danger');
            $(this).addClass('form-control');
            $('#error-msg').text("");
        });

        // saving data
        $('#save').on('click', function() {
            let title = $('input[name="title"]').val();
            let _token = $('input[name="_token"]').val();

            let data = {
                _token: _token,
                "title": title
            };
            // console.log(data);
            $.ajax({
                type: "POST",
                url: "/hmm-group/payment/payment",
                data: data,
                success: function(response) {
                    if (response.status == 201) {
                        window.location.href = '/hmm-group/payment/payment';
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
