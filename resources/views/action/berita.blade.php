<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="{{ $value['berita_id'] }}"
            data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="{{ $value['berita_id'] }}">
        <a class="dropdown-item btn-edit" href="{{ route('berita.show', $value['berita_id']) }}">Edit</a>
        <a class="dropdown-item btn-destroy" href="{{ route('berita.destroy', $value['berita_id']) }}">Hapus</a>
    </div>
</div>