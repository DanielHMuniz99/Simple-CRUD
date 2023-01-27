<div class="modal-content">
  <form>
    <input type="hidden" id="id" value="{{ $user ? $user->id : ''}}" />
    <div class="modal-header">
      <h4 class="modal-title">{{ $user ? 'Update User' : 'Add User'}}</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Name</label>
        <input type="text" id="name" class="form-control" value="{{ $user ? $user->name : ''}}" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" id="email" class="form-control" value="{{ $user ? $user->email : ''}}" required>
      </div>
      <div class="form-group">
        <label>Category</label>
        <select class="form-control" id="category_id">
          @foreach($categories as $category)
            <option {{ $user && $user->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      @if($user)
        <input type="button" class="btn btn-info" onclick="update('{{ $user->id }}')" value="Update">
      @else
        <input type="button" class="btn btn-info" onclick="save()" value="Save">
      @endif
    </div>
  </form>
</div>