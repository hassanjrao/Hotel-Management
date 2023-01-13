@extends('layouts.backend')

@section('page-title', 'Edit User')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">Edit User</h3>


            </div>
            <div class="block-content">
                <form action="{{ route('cpanel.users.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="label">Name</label>
                                    <input required type="text" value="{{ $user->name }}" class="form-control"
                                        id="name" name="name">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="label">email</label>
                                    <input required type="text" value="{{ $user->email }}" class="form-control"
                                        id="email" name="email">
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="label">Password</label>
                                    <input type="text"  class="form-control"
                                        id="password" name="password">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="label">Role</label>

                                    <select required class="form-select" name="role" id="role_id">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>



                        </div>



                    </div>

                    <div class="d-flex justify-content-end mb-4">

                        <button type="submit" class="btn btn-primary  border">Update</button>

                    </div>




                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection


