@extends('layouts::backend')
@push('title', 'Dashboard')

@section('content')
    <!-- Box Content -->
    <div class="row row-16 mb-20">
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="summary-card">
                <div class="summary-cont">
                    <div>
                        <p>Today's Money</p>
                        <h4>$53,000</h4>
                    </div>
                    <span class="summary-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12V17C22 20 20 22 17 22H7C4 22 2 20 2 17V12C2 9.28 3.64 7.38 6.19 7.06C6.45 7.02 6.72 7 7 7H17C17.26 7 17.51 7.00999 17.75 7.04999C20.33 7.34999 22 9.26 22 12Z" stroke="#6B7BFB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M17.7514 7.05C17.5114 7.01 17.2614 7.00001 17.0014 7.00001H7.00141C6.72141 7.00001 6.45141 7.02001 6.19141 7.06001C6.33141 6.78001 6.53141 6.52001 6.77141 6.28001L10.0214 3.02C11.3914 1.66 13.6114 1.66 14.9814 3.02L16.7314 4.79002C17.3714 5.42002 17.7114 6.22 17.7514 7.05Z"
                                stroke="#6B7BFB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 12.5H19C17.9 12.5 17 13.4 17 14.5C17 15.6 17.9 16.5 19 16.5H22" stroke="#6B7BFB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="summary-badge">
                    Than last month
                    <span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.75 9V9C15.75 12.7283 12.7283 15.75 9 15.75V15.75C5.27175 15.75 2.25 12.7283 2.25 9V9C2.25 5.27175 5.27175 2.25 9 2.25V2.25C12.7283 2.25 15.75 5.27175 15.75 9Z" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9 6V12" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.75 8.25L9 6L11.25 8.25" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        +4.8%
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="summary-card card02">
                <div class="summary-cont">
                    <div>
                        <p>Today’s Users</p>
                        <h4>2,000</h4>
                    </div>
                    <span class="summary-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#EA62FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.00001 3H9.00001C7.05001 8.84 7.05001 15.16 9.00001 21H8.00001" stroke="#EA62FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 3C16.95 8.84 16.95 15.16 15 21" stroke="#EA62FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 16V15C8.84 16.95 15.16 16.95 21 15V16" stroke="#EA62FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 9.0001C8.84 7.0501 15.16 7.0501 21 9.0001" stroke="#EA62FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="summary-badge">
                    Than last month
                    <span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.75 9V9C15.75 12.7283 12.7283 15.75 9 15.75V15.75C5.27175 15.75 2.25 12.7283 2.25 9V9C2.25 5.27175 5.27175 2.25 9 2.25V2.25C12.7283 2.25 15.75 5.27175 15.75 9Z" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9 6V12" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.75 8.25L9 6L11.25 8.25" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        5%
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="summary-card card03">
                <div class="summary-cont">
                    <div>
                        <p>New Clients</p>
                        <h4>+3,050</h4>
                    </div>
                    <span class="summary-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z" stroke="#FF5B5D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.5 4.5V6.5C14.5 7.6 15.4 8.5 16.5 8.5H18.5" stroke="#FF5B5D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 13H12" stroke="#FF5B5D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 17H16" stroke="#FF5B5D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="summary-badge">
                    Than last month
                    <span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 9V9C2.25 5.27175 5.27175 2.25 9 2.25V2.25C12.7283 2.25 15.75 5.27175 15.75 9V9C15.75 12.7283 12.7283 15.75 9 15.75V15.75C5.27175 15.75 2.25 12.7282 2.25 9Z" stroke="#F63A45" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9 12L9 6" stroke="#F63A45" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M11.25 9.75L9 12L6.75 9.75" stroke="#F63A45" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        -4.6%
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="summary-card card04">
                <div class="summary-cont">
                    <div>
                        <p>Total Sales</p>
                        <h4>$153,000</h4>
                    </div>
                    <span class="summary-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.67188 14.3298C8.67188 15.6198 9.66188 16.6598 10.8919 16.6598H13.4019C14.4719 16.6598 15.3419 15.7498 15.3419 14.6298C15.3419 13.4098 14.8119 12.9798 14.0219 12.6998L9.99187 11.2998C9.20187 11.0198 8.67188 10.5898 8.67188 9.36984C8.67188 8.24984 9.54187 7.33984 10.6119 7.33984H13.1219C14.3519 7.33984 15.3419 8.37984 15.3419 9.66984"
                                stroke="#4FA454" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 6V18" stroke="#4FA454" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H15C20 2 22 4 22 9V15C22 20 20 22 15 22Z" stroke="#4FA454" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="summary-badge">
                    Than last month
                    <span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 8V8C14.75 11.7283 11.7283 14.75 8 14.75V14.75C4.27175 14.75 1.25 11.7283 1.25 8V8C1.25 4.27175 4.27175 1.25 8 1.25V1.25C11.7283 1.25 14.75 4.27175 14.75 8Z" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8 5V11" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.75 7.25L8 5L10.25 7.25" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        +4.6%
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Area -->
    <div class="chart-wraper mb-20">
        <div class="row row-20">
            <div class="col-xl-8 col-lg-7 col-md-6">
                <div class="chart-card">
                    <div class="chart-card-header">
                        <p class="chart-card-title">Sales overview</p>
                        <div class="chart-control">
                            <select class="custom-selectTo" name="state">
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>

                    <div class="p-10">
                        <div class="row align-items-end">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <h2 class="chart-progressive">$678,897
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 8V8C14.75 11.7283 11.7283 14.75 8 14.75V14.75C4.27175 14.75 1.25 11.7283 1.25 8V8C1.25 4.27175 4.27175 1.25 8 1.25V1.25C11.7283 1.25 14.75 4.27175 14.75 8Z" stroke="#039F2F" stroke-width="1.2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 5V11" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.75 7.25L8 5L10.25 7.25" stroke="#039F2F" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        +4.6%
                                    </span>
                                </h2>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="chart-status  d-flex align-items-end flex-column">
                                    <ul>
                                        <li>Income</li>
                                        <li>Expense</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="salesChart" class="pe-2"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="chart-card">
                    <div class="chart-card-header">
                        <p class="chart-card-title">Course overview</p>
                        <div class="chart-control width-default">
                            <select class="custom-selectTo" name="state">
                                <option value="">Monthly</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">03</option>
                                <option value="">04</option>
                                <option value="">05</option>
                            </select>
                        </div>
                    </div>
                    <div id="gaugeChart" class="chartImage">
                        <img src="{{ asset('assets/backend/images/chart-image.png') }}" alt="">
                    </div>
                    <div class="row row-8 p-12">
                        <div class="col-4">
                            <div class="course-info">
                                <p>Your files</p>
                                <div class="course-num">
                                    <h3>321</h3>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="6" cy="6" r="4.5" stroke="#FF8926" stroke-width="3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="course-info">
                                <p>System</p>
                                <div class="course-num">
                                    <h3>321</h3>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="6" cy="6" r="4.5" stroke="#FFC187" stroke-width="3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="course-info">
                                <p>Internship</p>
                                <div class="course-num">
                                    <h3>321</h3>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="6" cy="6" r="4.5" stroke="#63BA69" stroke-width="3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Area -->
    <div class="table-area">
        <div class="row row-20">
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="card">
                    <div class="chart-card-header">
                        <p class="fs-16 fw-500 text-secondary mb-0">Student Performance</p>
                        <div>
                            <div class="chart-control cs-width90 d-flex align-items-center gap-8">
                                <select class="custom-selectTo" name="state">
                                    <option value="">This Year</option>
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
                                                <path d="M10.5003 7.58341H3.50033C3.15033 7.58341 2.91699 7.35008 2.91699 7.00008C2.91699 6.65008 3.15033 6.41675 3.50033 6.41675H10.5003C10.8503 6.41675 11.0837 6.65008 11.0837 7.00008C11.0837 7.35008 10.8503 7.58341 10.5003 7.58341Z" fill="#0E0F14" />
                                                <path d="M8.75033 11.0834H5.25033C4.90033 11.0834 4.66699 10.8501 4.66699 10.5001C4.66699 10.1501 4.90033 9.91675 5.25033 9.91675H8.75033C9.10033 9.91675 9.33366 10.1501 9.33366 10.5001C9.33366 10.8501 9.10033 11.0834 8.75033 11.0834Z" fill="#0E0F14" />
                                                <path d="M12.2503 4.08341H1.75033C1.40033 4.08341 1.16699 3.85008 1.16699 3.50008C1.16699 3.15008 1.40033 2.91675 1.75033 2.91675H12.2503C12.6003 2.91675 12.8337 3.15008 12.8337 3.50008C12.8337 3.85008 12.6003 4.08341 12.2503 4.08341Z" fill="#0E0F14" />
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
                    <!-- Student Table -->
                    <div class="table-responsive">
                        <table class="table align-middle fs-12 text-secondary student-table">
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
                                    <th scope="col">
                                        <span class="d-flex justify-content-end">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-first-column">
                                        <input type="checkbox" id="author01" class="form-check-input rowCheckbox">
                                        <figure>
                                            <img src="{{ asset('assets/backend/images/students/student-01.jpg') }}" class="rounded-circle img-fluid" alt="OnlineEdu">
                                        </figure>
                                        <label for="author01" class="form-check-label fs-12">
                                            <span class="d-block fw-500 mb-6">Ronald Richards</span>
                                            <span class="text-body">ronald@gmail.com</span>
                                        </label>
                                    </td>
                                    <td>Marketing</td>
                                    <td>14 January 2025</td>
                                    <td>22 January 2025</td>
                                    <td>92.2</td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-end">
                                            <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end rounded-6">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-first-column">
                                        <input type="checkbox" id="author02" class="form-check-input rowCheckbox">
                                        <figure>
                                            <img src="{{ asset('assets/backend/images/students/student-02.jpg') }}" class="rounded-circle img-fluid" alt="OnlineEdu">
                                        </figure>
                                        <label for="author02" class="form-check-label fs-12">
                                            <span class="d-block fw-500 mb-6">Esther Howard</span>
                                            <span class="text-body">esther@gmail.com</span>
                                        </label>
                                    </td>
                                    <td>Advertising</td>
                                    <td>16 January 2025</td>
                                    <td>27 January 2025</td>
                                    <td>44.1</td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-end">
                                            <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end rounded-6">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-first-column">
                                        <input type="checkbox" id="author03" class="form-check-input rowCheckbox">
                                        <figure>
                                            <img src="{{ asset('assets/backend/images/students/student-03.jpg') }}" class="rounded-circle img-fluid" alt="OnlineEdu">
                                        </figure>
                                        <label for="author03" class="form-check-label fs-12">
                                            <span class="d-block fw-500 mb-6">Jenny Wilson</span>
                                            <span class="text-body">jenny@gmail.com</span>
                                        </label>
                                    </td>
                                    <td>Marketing</td>
                                    <td>12 January 2025</td>
                                    <td>15 January 2025</td>
                                    <td>68.6</td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-end">
                                            <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end rounded-6">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-first-column">
                                        <input type="checkbox" id="author04" class="form-check-input rowCheckbox">
                                        <figure>
                                            <img src="{{ asset('assets/backend/images/students/student-04.jpg') }}" class="rounded-circle img-fluid" alt="OnlineEdu">
                                        </figure>
                                        <label for="author04" class="form-check-label fs-12">
                                            <span class="d-block fw-500 mb-6">Darlene Robertson</span>
                                            <span class="text-body">dardar@gmail.com</span>
                                        </label>
                                    </td>
                                    <td>Administration</td>
                                    <td>13 January 2025</td>
                                    <td>12 January 2025</td>
                                    <td>82.1</td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-end">
                                            <button class="btn btn-white border rounded-8 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.4189 10.0001C15.4189 10.2303 15.2323 10.4169 15.0021 10.4169C14.7719 10.4169 14.5853 10.2303 14.5853 10.0001C14.5853 9.76988 14.7719 9.58325 15.0021 9.58325C15.2323 9.58325 15.4189 9.76988 15.4189 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.4168 10.0001C10.4168 10.2303 10.2302 10.4169 9.99997 10.4169C9.76976 10.4169 9.58313 10.2303 9.58313 10.0001C9.58313 9.76988 9.76976 9.58325 9.99997 9.58325C10.2302 9.58325 10.4168 9.76988 10.4168 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.41473 10.0001C5.41473 10.2303 5.22811 10.4169 4.99789 10.4169C4.76768 10.4169 4.58105 10.2303 4.58105 10.0001C4.58105 9.76988 4.76768 9.58325 4.99789 9.58325C5.22811 9.58325 5.41473 9.76988 5.41473 10.0001" stroke="#0E0F14"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end rounded-6">
                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="card">
                    <div class="chart-card-header">
                        <p class="chart-card-title">Course Progress</p>
                        <div class="chart-control width-default">
                            <select class="custom-selectTo" name="state">
                                <option value="">Monthly</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">03</option>
                                <option value="">04</option>
                                <option value="">05</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="slider-wraper">
                            <div class="mb-16">
                                <p class="fw-500 mb-4">Introduction to Data Science</p>
                                <input id="range1" type="text" />
                            </div>
                            <div class="mb-16">
                                <p class="fw-500 mb-4">Advanced Machine Learning</p>
                                <input id="range2" type="text" />
                            </div>
                            <div class="mb-16">
                                <p class="fw-500 mb-4">Deep Learning Fundamentals</p>
                                <input id="range3" type="text" />
                            </div>
                            <div class="mb-0">
                                <p class="fw-500 mb-4">Machine Learning</p>
                                <input id="range4" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
