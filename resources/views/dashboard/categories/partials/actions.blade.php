<a href="{{ route('dashboard.categories.edit',  $data->id) }}" class="btn btn-primary btn-sm">
    <i class="fas fa-edit"></i>
</a>

<a href='{{ route('dashboard.categories.destroy', $data->id) }}'
   onclick=" event.preventDefault();
       var r = confirm('are you sure?');
       if (r==true){document.getElementById('delete{{$data->id}}').submit();}"
   class='btn btn-danger btn-sm'>

    <i class='fas fa-trash' data-toggle='tooltip'
       data-placement='top'
       title="">
    </i>
</a>

<form method="post"
      id="delete{{$data->id}}"
      action="{{ route('dashboard.categories.destroy', $data->id) }}"
      style="display: none;">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
</form>
