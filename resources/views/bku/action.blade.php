<div class="btn-group">
  <a href="{{ route('bku.edit', $id) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i> Edit</a>
  <form action="{{ route('bku.destroy', $id) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-sm btn-outline-success" type="submit" onclick="return confirm('are you sure?');"><i class="bi bi-trash"></i> Hapus</button>
  </form>
</div>