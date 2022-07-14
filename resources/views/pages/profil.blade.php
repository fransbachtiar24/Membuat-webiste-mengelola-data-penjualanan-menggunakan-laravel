@extends('layouts.master')

@section('title', 'Profil')

@section('content')
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <!---foto profil backround -->
            <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
        <div class="row g-4">
            <div class="col-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor"
                    class="bi bi-person-rolodex" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    <path
                        d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z" />
                </svg>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ auth()->user()->name }}</h3>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{ auth()->user()->alamat }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info <a href=""><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></a></h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nama </th>
                                                        <td class="text-muted">{{ auth()->user()->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Nomor Telepon </th>
                                                        <td class="text-muted">{{ auth()->user()->no_hp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail</th>
                                                        <td class="text-muted">{{ auth()->user()->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Alamat</th>
                                                        <td class="text-muted">{{ auth()->user()->alamat }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Skills <a href=""><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark-plus-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                                                </svg></a></h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Photoshop</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">illustrator</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Javascript</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">About</h5>
                                        <p>Hi I'm Anna Adame, It will be as simple as Occidental; in fact, it
                                            will be Occidental. To an English person, it will seem like
                                            simplified English, as a skeptical Cambridge friend of mine told me
                                            what Occidental is European languages are members of the same
                                            family.</p>
                                        <p>You always want to make sure that your fonts work well together and
                                            try to limit the number of fonts you use to three or less.
                                            Experiment and play around with the fonts that you already have in
                                            the software you’re working with reputable font websites. This may
                                            be the most commonly encountered tip I received from the designers I
                                            spoke with. They highly encourage that you use different fonts in
                                            one design, but do not over-exaggerate and go overboard.</p>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end tab-pane-->
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        @endsection
