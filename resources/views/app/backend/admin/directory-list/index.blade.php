@extends('layouts::backend')
@push('title', 'Directory List')

@section('content')
    <div class="directoryList-wrapper">
        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">Directory Listing</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <a href="{{ route('directoryList.create') }}" class="btn btn-sm btn-dark">Add New Listing</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3">
                <div class="directoryList-menu">
                    <ul>
                        <li><a href="#">Hotel <i class="fa-solid fa-arrow-right"></i></a></li>
                        <li class="active"><a href="#">Real-Estate <i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a href="#">Beauty <i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a href="#">Dentist <i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><a href="#">Hospital <i class="fa-solid fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9">
                <div class="directoryList-items">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>John</td>
                                <td>Doe</td>
                                <td>@social</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
