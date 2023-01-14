@extends('layouts.backend')
@section('page-title', 'Destinations')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Destinations
                </h3>



                <a href="{{ route('cpanel.destinations.create') }}" class="btn btn-primary push">Add</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Main Text</th>
                                <th>Home</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($destinations as $ind => $destination)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $destination->name }}</td>
                                    <td class="text-center">
                                        @if ($destination->image)
                                            <img src="{{ asset('storage/destinations/' . $destination->image) }}"
                                                alt="" width="100px" height="100px">
                                        @else
                                            -
                                        @endif

                                    </td>
                                    <td>{!! substr(strip_tags($destination->main_text), 0, 10) . ' ...' !!}</td>
                                    <td class="text-center">

                                        <x-home-page-badge :home_page="$destination->home_page"></x-home-page-badge>
                                    </td>
                                    <td>
                                        <x-release-status-badge :code="$destination->releaseStatus->code" :label="$destination->releaseStatus->name" />
                                    </td>
                                    <td>{{ $destination->created_at }}</td>
                                    <td>{{ $destination->updated_at }}</td>

                                    <td>

                                        <div class="btn-group me-2 mb-2" role="group"
                                            aria-label="Icons Outline Text group">

                                            {{-- <button type="button" class="btn btn-primary w-100" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Top Tooltip">Top</button> --}}

                                            <a href="{{ route('cpanel.destinations.release', ['release_status' => 'published', 'destination_id' => $destination->id]) }}"
                                                class="btn btn-xs btn-outline-success " data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Publish">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('cpanel.destinations.release', ['release_status' => 'not_published', 'destination_id' => $destination->id]) }}"
                                                class="btn btn-xs btn-outline-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Un Publish">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                            {{-- <a href="#" class="btn btn-xs btn-outline-secondary">
                                                <i class="fa fa-archive"></i>
                                            </a> --}}
                                            <a href={{ route('cpanel.destinations.edit', ['destination' => $destination]) }}
                                                class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form id="form-{{ $destination->id }}"
                                                action="{{ route('cpanel.destinations.destroy', $destination->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <a onclick="confirmDelete({{ $destination->id }})"
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
