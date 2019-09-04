<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="{{ $value['arsip_id'] }}"
            data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="{{ $value['arsip_id'] }}">
        <a target="_blank" class="dropdown-item" href="{{ route('arsip.download', $value['arsip_slug']) }}">Preview</a>
        <a class="dropdown-item btn-edit" href="{{ route('arsip.show', $value['arsip_id']) }}">Edit</a>
        <a class="dropdown-item btn-destroy" href="{{ route('arsip.destroy', $value['arsip_id']) }}">Hapus</a>
    </div>
</div>