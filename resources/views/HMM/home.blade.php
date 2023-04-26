@extends('HMM.layouts.app')

@section('content')
    <div class="home-container" style="height: 300px;">
        <div class="row w-75 mx-auto" style="width: 50%;">
            <div class="col-12">
                <div action="" method="post">
                    <div class="form-group search-form-group">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search-component" id="" class="form-control search-component"
                            placeholder="Search Component.....Eg.Dashboard">
                    </div>
                </div>
            </div>
            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.dashboard') }}">
                    <div class="card component-card" style="margin-right: 20px; height: 120px;">
                        <div class="card-body" style="display: grid;place-items:center;background: #F66879;color: #FFFFFF;">
                            <i class="fas fa-chart-line fs-3"></i>
                            <small><strong>Dashboard</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.hmm') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #FF9A9A;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-swatchbook fs-3 shadow-sm"></i>
                            <small><strong>HMM</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.attendance') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #95E265;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-address-card fs-3 shadow-sm"></i>
                            <small><strong>Attendance</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.exam') }}">
                    <div class="card component-card"
                        style="margin-left:20px;height: 120px;background: #73A3ED;color:#FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-book-open fs-3 shadow-sm"></i>
                            <small><strong>Exam</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.payment') }}">
                    <div class="card component-card" style="margin-right: 20px; height: 120px;">
                        <div class="card-body" style="display: grid;place-items:center;background: #22D4EC;color: #FFFFFF;">
                            <i class="fas fa-credit-card fs-3 shadow-sm"></i>
                            <small><strong>Payment</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.setting') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #3CD3B8;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-cog fs-3 shadow-sm"></i>
                            <small><strong>Settings</strong></small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
