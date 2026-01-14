@extends('layouts::backend')
@push('title', 'Dashboard')

@push('breadcrumb')
@endpush

@section('content')
    <div class="table-responsive">
        <table class="table fs-12 text-secondary student-table align-middle">
            <thead class="table-light">
                <tr class="">
                    <th scope="col">
                        <div class="d-flex align-items-center gap-6">
                            <input type="checkbox" id="name" class="form-check-input m-0 selectAll">
                            <label for="name" class="form-check-label">Name</label>
                        </div>
                    </th>
                    <th scope="col">Class</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Finish Date</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="table-first-column">
                            <input type="checkbox" id="author01" class="form-check-input rowCheckbox">
                            <figure>
                                <img src="assets/images/students/student-01.jpg" class="rounded-circle img-fluid" alt="OnlineEdu">
                            </figure>
                            <label for="author01" class="form-check-label fs-12">
                                <span class="d-block fw-500 mb-6">Ronald Richards</span>
                                <span class="text-body">ronald@gmail.com</span>
                            </label>
                        </div>
                        <div class="row-action">
                            <ul>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>Marketing</td>
                    <td>14 January 2025</td>
                    <td>22 January 2025</td>
                    <td>92.2</td>
                </tr>
                <tr>
                    <td>
                        <div class="table-first-column">
                            <input type="checkbox" id="author02" class="form-check-input rowCheckbox">
                            <figure>
                                <img src="assets/images/students/student-02.jpg" class="rounded-circle img-fluid" alt="OnlineEdu">
                            </figure>
                            <label for="author02" class="form-check-label fs-12">
                                <span class="d-block fw-500 mb-6">Esther Howard</span>
                                <span class="text-body">esther@gmail.com</span>
                            </label>
                        </div>
                        <div class="row-action">
                            <ul>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>Advertising</td>
                    <td>16 January 2025</td>
                    <td>27 January 2025</td>
                    <td>44.1</td>
                </tr>
                <tr>
                    <td>
                        <div class="table-first-column">
                            <input type="checkbox" id="author03" class="form-check-input rowCheckbox">
                            <figure>
                                <img src="assets/images/students/student-03.jpg" class="rounded-circle img-fluid" alt="OnlineEdu">
                            </figure>
                            <label for="author03" class="form-check-label fs-12">
                                <span class="d-block fw-500 mb-6">Jenny Wilson</span>
                                <span class="text-body">jenny@gmail.com</span>
                            </label>
                        </div>
                        <div class="row-action">
                            <ul>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>Marketing</td>
                    <td>12 January 2025</td>
                    <td>15 January 2025</td>
                    <td>68.6</td>
                </tr>
                <tr>
                    <td>
                        <div class="table-first-column">
                            <input type="checkbox" id="author04" class="form-check-input rowCheckbox">
                            <figure>
                                <img src="assets/images/students/student-04.jpg" class="rounded-circle img-fluid" alt="OnlineEdu">
                            </figure>
                            <label for="author04" class="form-check-label fs-12">
                                <span class="d-block fw-500 mb-6">Darlene Robertson</span>
                                <span class="text-body">dardar@gmail.com</span>
                            </label>
                        </div>
                        <div class="row-action">
                            <ul>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>Administration</td>
                    <td>13 January 2025</td>
                    <td>12 January 2025</td>
                    <td>82.1</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
