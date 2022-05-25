@extends('admin.layouts.app')
    <!-- Main Content -->
    @section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        @include('admin.header')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">User Management</h1>
                
            </div>
            <!-- Content Row -->
            <div class="row">
                
            </div>

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="userTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Approved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($name as $data)
                                        <tr>
                                            <th>{{ $data->name}}</th>
                                            <th>{{ $data->email}}</th>
                                            <th>{{ $data->approved}}</th>
                                            @if ($data->approved === "no")
                                                <th><a class="btn btn-primary btn-sm btn-block" href="{{ route('updateUserApprovalView.user',$data->id) }}">Approve</a></th>
                                            @else
                                            <th><a class="btn btn-danger btn-sm btn-block"
                                                href="{{ route('updateUserApprovalView.user',$data->id) }}">Deactivate</a></th>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
