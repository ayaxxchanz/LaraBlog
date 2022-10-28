@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <center>
                            <img class="rounded-circle avatar-xl"
                                src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/admin_images/no_image.jpg') }}"
                                alt="Card image cap">
                        </center>

                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $adminData->name }}
                            <p><strong>Username:</strong> {{ $adminData->username }}</p>
                            <p><strong>Email:</strong> {{ $adminData->email }}</p>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info w-100 waves-effect waves-light">
                                Edit Profile</a>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection
