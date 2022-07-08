@bsMultilangualFormTabs

{{ BsForm::text('name')->autofocus() }}

@endBsMultilangualFormTabs

{{ BsForm::file('image') }}

@if(isset($category) and $category->image)
    <img id="image-preview" width="20%" src="{{ $category->imageUrl('image') }}">
@else
    <img id="image-preview" width="20%"
         src="{{ asset('images/backend/placeholder.png') }}">
@endif

{{ BsForm::select('parent_id')->options([''=> __('core.select')] + $categories->pluck('name','id')->toArray()) }}
