@extends('layouts.app')

@section('custom_styles')

@endsection

@section('content')
        <div class="page-body">
        <div class="container-xl">

            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            The Observed
                        </div>
                        <h2 class="page-title">
                            Lessons
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('lesson.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Create new observation
                            </a>
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-report" aria-label="Create new report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.notification')

            <div class="page-body">
                <div class="row row-deck row-cards">

                    {{-- First card --}}
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Latest</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="h1 mb-3">{{ $latest->teacher->name }}</div>
                                <div class="d-flex mb-2">
                                    <div>&nbsp;</div>
                                    <div class="ms-auto">

                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 100%" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                        <span class="visually-hidden">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Second card --}}
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Observations</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="h1 mb-3">{{ $lessons_count }}</div>
                                <div class="d-flex mb-2">
                                    <div>&nbsp;</div>
                                    <div class="ms-auto">

                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 100%" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" aria-label="100% Complete">
                                        <span class="visually-hidden">100% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Third card --}}
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Total Users</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="h1 mb-3">{{ $users }}</div>
                                <div class="d-flex mb-2">
                                    <div>&nbsp;</div>
                                    <div class="ms-auto">

                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 75%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                        <span class="visually-hidden">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Fourth card --}}
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Last Assessor</div>
                                    <div class="ms-auto lh-1">

                                    </div>
                                </div>
                                <div class="h1 mb-3">{{ $latest == null ? "None" : $latest->user->name }}</div>
                                <div class="d-flex mb-2">
                                    <div>&nbsp;</div>
                                    <div class="ms-auto">

                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-blue" style="width: 75%" role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                        <span class="visually-hidden">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lesson Observations</h3>
                            </div>
                            {{-- <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Show
                                        <div class="mx-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm" value="8" size="3"
                                                aria-label="Invoices count">
                                        </div>
                                        entries
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm"
                                                aria-label="Search invoice">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-1"></th>
                                            <th class="w-1">Teacher Name</th>
                                            <th>Class Observed</th>
                                            <th>Subject</th>
                                            <th>Topic</th>
                                            <th>Observed by</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lessons as $lesson)
                                        <tr>
                                            <td>{{ $lesson->id }}</td>
                                            <td>{{ $lesson->teacher->name }}</td>
                                            <td>Year {{ $lesson->studentClass->name }} {{ $lesson->stream }}</td>
                                            <td>{{ $lesson->subject->name }}</td>
                                            <td>{{ $lesson->topic }}</td>
                                            <td>{{ $lesson->user->name }}</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-start">
                                                        <a class="dropdown-item text-primary" href="{{ route('lesson.show', $lesson->id) }}">View</a>
                                                        <a class="dropdown-item text-success" href="{{ route('lesson.edit', $lesson->id) }}">Edit</a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                {{ $lessons->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
