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
                                <x-drop-modal :title="translate('Add SubCategory')" :url="path(['admin::category.create_subcategory', 'category_id' => $category->id])" />
                                <x-drop-modal :title="translate('Edit')" :url="path(['admin::category.edit', 'slug' => $category->slug])" />
                                <x-drop-delete :title="translate('Delete')" :url="route('category.subDelete', $category->slug)" />
                            </x-dropdown>
                        </div>
                        <div class="cate-header">
                            <h4><i class="{{ $category->icon }}"></i> {{ $category->title }}</h4>
                            @php
                                $subCategoryAll = Category::where('parent_id', $category->id);

                                $subCateCount = $subCategoryAll->count();
                                $subCateGet = $subCategoryAll->get();

                                if ($subCateCount < 9 && $subCateCount != 0) {
                                    $subCateCount = '0' . $subCateCount;
                                }

                            @endphp
                            <span>Items {{ $subCateCount }}</span>
                            <img class="cate-thumbnail" src="{{ getImage($category->image) }}" alt="">
                        </div>
                        <div class="subCategory">
                            <ul>
                                @foreach ($subCateGet as $subCategory)
                                    <li>
                                        <span><i class="{{ $subCategory->icon }}"></i> {{ $subCategory->title }}</span>
                                        <x-dropdown>
                                            <x-drop-modal :title="translate('Edit')" :url="path(['admin::category.edit_subcategory', 'slug' => $subCategory->slug, 'parent_id' => $subCategory->parent_id])" />
                                            <x-drop-delete :title="translate('Delete')" :url="route('category.subDelete', $subCategory->slug, $subCategory->parent_id)" />
                                        </x-dropdown>
                                    </li>
                                @endforeach
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
