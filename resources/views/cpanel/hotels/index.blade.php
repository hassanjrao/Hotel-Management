@extends('layouts.backend')
@section('page-title', 'Hotels')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Hotels
                </h3>



                <a href="{{ route('cpanel.hotels.create') }}" class="btn btn-primary push">Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Class</th>
                                <th>Destination</th>
                                <th>Home</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($hotels as $ind => $hotel)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $hotel->title }}</td>

                                    <td>{{ $hotel->sub_title }}</td>
                                    <td>{{ $hotel->hotelStar->name }}</td>
                                    <td>{{ $hotel->destination->name }}</td>
                                    <td class="text-center">
                                        <x-home-page-badge :home_page="$hotel->home_page"></x-home-page-badge>
                                    </td>
                                    <td>
                                        <x-release-status-badge :code="$hotel->releaseStatus->code" :label="$hotel->releaseStatus->name" />
                                    </td>
                                    <td>{{ $hotel->created_at }}</td>
                                    <td>{{ $hotel->updated_at }}</td>

                                    <td>

                                        <div class="btn-group me-2 mb-2" role="group"
                                            aria-label="Icons Outline Text group">

                                            @if (auth()->user()->hasRole('admin'))
                                                <a href="{{ route('cpanel.hotels.release', ['release_status' => 'published', 'hotel_id' => $hotel->id]) }}"
                                                    class="btn btn-xs btn-outline-success " data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Publish">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('cpanel.hotels.release', ['release_status' => 'not_published', 'hotel_id' => $hotel->id]) }}"
                                                    class="btn btn-xs btn-outline-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Un Publish">
                                                    <i class="fa fa-ban"></i>
                                                </a>
                                            @endif
                                            {{-- <a href="#" class="btn btn-xs btn-outline-secondary">
                                                <i class="fa fa-archive"></i>
                                            </a> --}}
                                            <a href={{ route('cpanel.hotels.edit', ['hotel' => $hotel]) }}
                                                class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form id="form-{{ $hotel->id }}"
                                                action="{{ route('cpanel.hotels.destroy', $hotel->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <a onclick="confirmDelete({{ $hotel->id }})"
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
