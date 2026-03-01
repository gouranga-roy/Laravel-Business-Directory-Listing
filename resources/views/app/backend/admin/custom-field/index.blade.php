@extends('layouts::backend')
@push('title', 'Custom Filed')

@section('content')
    <div class="directoryList-wrapper">
        <div class="row mb-20 py-10 rounded-10 bg-light align-items-center">
            <div class="col-lg-6 col-md-6">
                <h4 class="fs-20 text-secondary mb-0">{{ translate('Custom Field') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 text-end">
                <x-btn-modal :title="translate('Add Custom Field')" :dataTitle="translate('New Custom Field')" :url="path(['admin::custom-field.create'])" />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-white border-color p-10 border-bottom-0">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <p class="fs-16 fw-500 text-secondary mb-0">{{ translate('Custom Field Lists') }}</p>
                            <div>
                                <div class="chart-control d-flex align-items-center flex-wrap gap-8">
                                    <div class="message-search">
                                        <form action="#" class="w-100">
                                            <input type="search" class="form-control fs-12 border rounded-6" id="search" placeholder="Search">
                                            <label for="search">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.66732 14.4997C3.90065 14.4997 0.833984 11.433 0.833984 7.66634C0.833984 3.89967 3.90065 0.833008 7.66732 0.833008C11.434 0.833008 14.5007 3.89967 14.5007 7.66634C14.5007 11.433 11.434 14.4997 7.66732 14.4997ZM7.66732 1.83301C4.44732 1.83301 1.83398 4.45301 1.83398 7.66634C1.83398 10.8797 4.44732 13.4997 7.66732 13.4997C10.8873 13.4997 13.5007 10.8797 13.5007 7.66634C13.5007 4.45301 10.8873 1.83301 7.66732 1.83301Z"
                                                        fill="#515155"></path>
                                                    <path
                                                        d="M14.6671 15.1663C14.5404 15.1663 14.4137 15.1196 14.3137 15.0196L12.0005 13C11.8072 12.8067 11.8072 12.4867 12.0005 12.2933C12.1938 12.1 12.5138 12.1 12.7072 12.2933L15.0204 14.313C15.2137 14.5063 15.2137 14.8263 15.0204 15.0196C14.9204 15.1196 14.7937 15.1663 14.6671 15.1663Z"
                                                        fill="#515155"></path>
                                                </svg>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Student Table -->
                    <div class="table-responsive">
                        <table class="table align-middle fs-12 text-secondary student-table align-middle table-bordered all-studentTable mb-0">
                            <thead class="table-light">
                                <tr class="fs-12 fw-400 text-uppercase">
                                    <th scope="col">
                                        <div class="d-flex align-items-center gap-6">
                                            <input type="checkbox" id="name" class="form-check-input m-0 selectAll">
                                            <label for="name" class="form-check-label">{{ translate('Sl.No') }}</label>
                                        </div>
                                    </th>
                                    <th scope="col">{{ translate('Field Name') }}</th>
                                    <th scope="col">{{ translate('Field Type') }}</th>
                                    <th scope="col">{{ translate('Status') }}</th>
                                    <th scope="col">
                                        <span class="d-flex justify-content-end">{{ translate('Action') }}</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fieldAll as $key => $field)
                                    <tr>
                                        <td class="d-flex align-items-center gap-2">
                                            <input type="checkbox" id="author01" class="form-check-input rowCheckbox mt-0">
                                            <label for="author01" class="form-check-label fs-12 mb-0 d-flex align-items-center justify-content-between">{{ $loop->iteration }}</label>
                                        </td>
                                        <td>
                                            {{ $field->label }} <span class="is_required">{{ $field->is_required == 1 ? '*' : '' }}</span>
                                        </td>
                                        <td>{{ $field->field }}</td>
                                        <td>
                                            <div class="form-switch dtable-switch p-0">
                                                <input class="form-check-input fieldSwitcher" type="checkbox" role="switch" id="dswitch4" {{ $field->status == 1 ? 'checked' : '' }} data-id="{{ $field->id }}">
                                            </div>
                                        </td>
                                        <td>
                                            <x-dropdown>
                                                <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-field.edit', 'id' => $field->id])" />
                                                <x-drop-delete :title="translate('Delete')" :url="route('customField.delete', $field->id)" />
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    @endsection


    @push('js')
        <script>
            'use strict';

            $(document).on('change', '.fieldSwitcher', function() {
                let field_id = $(this).data('id');

                $.ajax({
                    url: "{{ route('customField.status') }}",
                    type: "POST",
                    data: {
                        field_id: field_id
                    },

                    success: function(res) {
                        return success(res.success);
                    }

                });

            });
        </script>
    @endpush
