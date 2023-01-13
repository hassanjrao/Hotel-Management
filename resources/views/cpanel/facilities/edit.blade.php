@extends('layouts.backend')

@section('page-title', 'Edit Facility')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">Edit Facility</h3>


            </div>
            <div class="block-content">
                <form action="{{ route('cpanel.facilities.update', $facility->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="label">Name</label>
                                    <input required type="text" value="{{ $facility->name }}" class="form-control" id="name"
                                        name="name">
                                </div>

                                <div class="col-6 mt-2">
                                    <label class="form-label" for="label">Image</label>
                                    <input type="file" class="form-control" id="Image"
                                        name="image">

                                        <img src="{{ asset('storage/facilities/' . $facility->image) }}" alt="" width="100px"
                                            height="100px">
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


