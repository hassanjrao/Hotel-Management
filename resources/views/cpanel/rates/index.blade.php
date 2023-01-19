@extends('layouts.backend')
@section('page-title', 'Rates')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Rates
                </h3>



                <a href="{{ route('cpanel.rates.create') }}" class="btn btn-primary push">Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Package</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($rates as $ind => $rate)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $rate->room->title }}</td>
                                    <td>{{ $rate->start_date }}</td>

                                    <td>{{ $rate->end_date }}</td>
                                    <td>{{ $rate->package->name }}</td>
                                    <td>{{ $rate->price_per_night }}</td>

                                    <td>{{ $rate->created_at }}</td>
                                    <td>{{ $rate->updated_at }}</td>

                                    <td>

                                        <div class="btn-group me-2 mb-2" role="group"
                                            aria-label="Icons Outline Text group">


                                            <a href={{ route('cpanel.rates.edit', ['rate' => $rate]) }}
                                                class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form id="form-{{ $rate->id }}"
                                                action="{{ route('cpanel.rates.destroy', $rate->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <a onclick="confirmDelete({{ $rate->id }})"
                                                    class="btn btn-xs btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>

                                            </form>


                                        </div>

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
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
