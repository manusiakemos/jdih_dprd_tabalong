<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="{{ $value['ad_id'] }}"
            data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="{{ $value['ad_id'] }}">
        <a class="dropdown-item btn-show" target="_blank" href="{{ route('ad.preview', encrypt($value['ad_id'])) }}">Lihat PDF</a>
        <a class="dropdown-item btn-edit" href="{{ route('ad.edit', encrypt($value['ad_id'])) }}">Edit</a>
        <a class="dropdown-item btn-destroy" href="{{ route('ad.destroy', encrypt($value['ad_id'])) }}">Hapus</a>
    </div>
</div>