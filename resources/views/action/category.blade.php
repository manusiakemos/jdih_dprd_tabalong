<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="{{ $value['cat_id'] }}"
            data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="{{ $value['cat_id'] }}">
        <a class="dropdown-item btn-edit" href="{{ route('category.show', $value['cat_id']) }}">Edit</a>
        <a class="dropdown-item btn-destroy" href="{{ route('category.destroy', $value['cat_id']) }}">Hapus</a>
    </div>
</div>