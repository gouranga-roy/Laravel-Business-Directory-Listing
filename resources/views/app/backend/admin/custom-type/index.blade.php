@extends('layouts::backend')
@push('title', 'Dashboard')

@section('content')
    <div class="table-header text-end mb-10">
        <x-btn-modal :title="translate('Add List Type')" :url="path(['backend::admin.custom-type.create'])" />
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="type-box">
                <div class="type-status">
                    <a class="status active" href="#">Active</a>
                    <div class="dropdown d-flex justify-content-end">
                        <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="26" height="26" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end rounded-6" style="">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/17746/17746611.png" alt="">
                <h2>Hotel</h2>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="type-box">
                <div class="type-status">
                    <a class="status inactive" href="#">Inactive</a>
                    <div class="dropdown d-flex justify-content-end">
                        <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="26" height="26" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end rounded-6" style="">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/6676/6676612.png" alt="">
                <h2>Real-Estate</h2>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="type-box">
                <div class="type-status">
                    <a class="status inactive" href="#">Inactive</a>
                    <div class="dropdown d-flex justify-content-end">
                        <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="26" height="26" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end rounded-6" style="">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/1940/1940922.png" alt="">
                <h2>Beauty</h2>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="type-box">
                <div class="type-status">
                    <a class="status inactive" href="#">Inactive</a>
                    <div class="dropdown d-flex justify-content-end">
                        <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="26" height="26" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end rounded-6" style="">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3361/3361783.png" alt="">
                <h2>Restaurant</h2>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-card-header">
            <div class="chart-card-header">
                <p class="fs-16 fw-500 text-secondary mb-0">Student Performance</p>
                <div>
                    <div class="chart-control cs-width90 d-flex align-items-center gap-8">
                        <select class="custom-selectTo select2-hidden-accessible" name="state" data-select2-id="select2-data-10-cjsk" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="select2-data-12-io1x">This Year</option>
                            <option value="">2026</option>
                            <option value="">2027</option>
                            <option value="">2028</option>
                            <option value="">2029</option>
                            <option value="">2030</option>
                        </select>
                        <div class="dropdown filtr-btn">
                            <button class="btn btn-light bg-white border rounded-8 fs-12 fw-500 dropdown-toggle d-flex align-items-center gap-1 text-body" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="lh-1">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5003 7.58341H3.50033C3.15033 7.58341 2.91699 7.35008 2.91699 7.00008C2.91699 6.65008 3.15033 6.41675 3.50033 6.41675H10.5003C10.8503 6.41675 11.0837 6.65008 11.0837 7.00008C11.0837 7.35008 10.8503 7.58341 10.5003 7.58341Z" fill="#0E0F14"></path>
                                        <path d="M8.75033 11.0834H5.25033C4.90033 11.0834 4.66699 10.8501 4.66699 10.5001C4.66699 10.1501 4.90033 9.91675 5.25033 9.91675H8.75033C9.10033 9.91675 9.33366 10.1501 9.33366 10.5001C9.33366 10.8501 9.10033 11.0834 8.75033 11.0834Z" fill="#0E0F14"></path>
                                        <path d="M12.2503 4.08341H1.75033C1.40033 4.08341 1.16699 3.85008 1.16699 3.50008C1.16699 3.15008 1.40033 2.91675 1.75033 2.91675H12.2503C12.6003 2.91675 12.8337 3.15008 12.8337 3.50008C12.8337 3.85008 12.6003 4.08341 12.2503 4.08341Z" fill="#0E0F14"></path>
                                    </svg>
                                </span>
                                Filter
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
@endsection
