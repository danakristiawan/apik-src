<div class="btn-group">
  <a href="{{ route('satker.edit', $id) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i> Edit</a>
  <form action="{{ route('satker.destroy', $id) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-sm btn-outline-success" type="submit" onclick="return confirm('are you sure?');"><i class="bi bi-trash"></i> Hapus</button>
  </form>
</div>