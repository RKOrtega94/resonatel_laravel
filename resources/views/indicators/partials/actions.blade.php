<form action="{{ route('indicators.destroy', $id) }}" method="post">
    @csrf
    @method('delete')
    <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('indicators.show', $id) }}" data-original-title=""
        title="" style="margin: 0%">
        <i class="material-icons" style="margin: 0%">visibility</i>
        <div class="ripple-container" style="margin: 0%"></div>
    </a>
    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('indicators.edit', $id) }}" data-original-title=""
        title="" style="margin: 0%">
        <i class="material-icons" style="margin: 0%">edit</i>
        <div class="ripple-container" style="margin: 0%"></div>
    </a>
    <button type="button" class="btn btn-danger btn-link" data-original-title="" title=""
        onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''"
        style="margin: 0%">
        <i class="material-icons" style="margin: 0%">close</i>
        <div class="ripple-container" style="margin: 0%"></div>
    </button>
</form>
