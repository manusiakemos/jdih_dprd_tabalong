<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="{{ $value['cb_id'] }}"
            data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="{{ $value['cb_id'] }}">
        <a class="dropdown-item btn-edit" href="{{ route('category-berita.show', $value['cb_id']) }}">Edit</a>
        <a class="dropdown-item btn-destroy" href="{{ route('category-berita.destroy', $value['cb_id']) }}">Hapus</a>
    </div>
</div>