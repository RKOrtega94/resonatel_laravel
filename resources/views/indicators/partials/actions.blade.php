<form action="{{ route('indicators.destroy', $id) }}" method="post">
    @csrf
    @method('delete')

    <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('indicators.show', $id) }}" data-original-title=""
        title="">
        <i class="material-icons">visibility</i>
        <div class="ripple-container"></div>
    </a>
    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('indicators.edit', $id) }}"
        data-original-title="" title="">
        <i class="material-icons">edit</i>
        <div class="ripple-container"></div>
    </a>
    <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
        onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
        <i class="material-icons">close</i>
        <div class="ripple-container"></div>
    </button>
</form>
