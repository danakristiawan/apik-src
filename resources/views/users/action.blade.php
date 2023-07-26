<div class="btn-group">
  <a href="{{ route('users.edit', $id) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i> Edit</a>
  <form action="{{ route('users.destroy', $id) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-sm btn-outline-success" type="submit"><i class="bi bi-trash"></i> Hapus</button>
  </form>
</div>