@extends('layouts::backend')
@push('title', 'Dashboard')

@section('content')
    <div class="table-header text-end mb-10">
        <x-btn-modal :title="translate('Add List Type')" :url="path(['backend::admin.custom-type.create'])" />
    </div>

    <div class="row">
        @foreach ($list_type as $type)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="type-box">
                    <div class="type-status">
                        @if ($type->status == 1)
                            <a class="status active" href="#">Active</a>
                        @else
                            <a class="status" href="#">Inactive</a>
                        @endif

                        <x-dropdown>
                            <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-type.edit', 'id' => $type->id])" />
                            <x-drop-delete :title="translate('Delete')" :url="route('type.delete', $type->id)" />
                        </x-dropdown>
                    </div>
                    <img src="{{ getImage($type->image) }}" alt="">

                    <h2>{{ $type->name }}</h2>
                </div>
            </div>
        @endforeach
    </div>
@endsection
