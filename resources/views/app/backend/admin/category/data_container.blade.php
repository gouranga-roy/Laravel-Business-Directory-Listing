@php
    use App\Models\Type;
    use App\Models\Category;

    $type_id = $slug ? Type::where('slug', $slug)->value('id') : Type::value('id');
    $query = Category::where('type_id', $type_id);
    $categories = $query->where('parent_id', 0)->get();
@endphp
<div class="col-xxl-9 col-lg-8 col-md-8">
    @if ($categories->count() > 0)
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-6">
                    <div class="categories-item">
                        <div class="category-action">
                            <x-dropdown>
                                <x-drop-modal :title="translate('Add SubCategory')" :url="path(['backend::admin.custom-type.edit', 'slug' => $type->slug])" />
                                <x-drop-modal :title="translate('Edit')" :url="path(['admin::category.edit', 'slug' => $category->slug])" />
                                <x-drop-delete :title="translate('Delete')" :url="route('category.delete', $category->slug)" />
                            </x-dropdown>
                        </div>
                        <div class="cate-header">
                            <h4><i class="{{ $category->icon }}"></i> {{ $category->title }}</h4>
                            <span>Items 05</span>
                            <img class="cate-thumbnail" src="{{ getImage($category->image) }}" alt="">
                        </div>
                        <div class="subCategory">
                            <ul>
                                <li>
                                    <span>Sub Category One</span>
                                    <x-dropdown>
                                        <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-type.edit', 'slug' => $type->slug])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('type.delete', $type->slug)" />
                                    </x-dropdown>
                                </li>
                                <li>
                                    <span>Sub Category Two</span>
                                    <x-dropdown>
                                        <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-type.edit', 'slug' => $type->slug])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('type.delete', $type->slug)" />
                                    </x-dropdown>
                                </li>
                                <li>
                                    <span>Sub Category Three</span>
                                    <x-dropdown>
                                        <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-type.edit', 'slug' => $type->slug])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('type.delete', $type->slug)" />
                                    </x-dropdown>
                                </li>
                                <li>
                                    <span>Sub Category Fore</span>
                                    <x-dropdown>
                                        <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-type.edit', 'slug' => $type->slug])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('type.delete', $type->slug)" />
                                    </x-dropdown>
                                </li>
                                <li>
                                    <span>Sub Category Five</span>
                                    <x-dropdown>
                                        <x-drop-modal :title="translate('Edit')" :url="path(['backend::admin.custom-type.edit', 'slug' => $type->slug])" />
                                        <x-drop-delete :title="translate('Delete')" :url="route('type.delete', $type->slug)" />
                                    </x-dropdown>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        @include('admin::no_data')
    @endif

</div>
