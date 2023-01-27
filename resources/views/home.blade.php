@include('inc.header')

<table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
  <thead>
    <tr>
      <td>ID</td>
      <td>Name'</td>
      <td>Email</td>
      <td>Category</td>
      <td>Action</td>
    </tr>
  </thead>
</table>

  </div>
</div>
<!-- Edit Modal HTML -->

<!-- Edit Modal HTML -->
<div id="modalUsers" class="modal fade">
  <div class="modal-dialog" id="modalContent">
    
  </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <input type="hidden" id="deleteUserId" value="" />
        <div class="modal-header">
          <h4 class="modal-title">Delete User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete the user?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="button" class="btn btn-danger" onclick="deleteUser()" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>

@include('inc.footer')

<script>

loadTable()

function loadTable()
{
  $('#empTable').DataTable({
    processing: true,
    serverSide: true,
    serverMethod: 'get',
    ajax: "{{ url('/load') }}",
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'email' },
      { data: 'category' },
      { data: 'action' },
    ]
  });
}

function callModal(id = 0)
{
  $.ajax({
    method: "GET",
    data: {id: id},
    url: "{{ url('/modal') }}"
  })
  .done(function(data) {
    $("#modalUsers").modal();
    $("#modalContent").html(data);
  });
}

$(".btn-add").on("click", function(date) {
  callModal()
})

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function save()
{
  $.ajax({
    _token: "{{ csrf_token() }}",
    method: "POST",
    data: {name: $("#name").val(), email: $("#email").val(), category_id: $("#category_id").val()},
    url: "{{ url('/add') }}"
  })
  .done(function(data){
    $('#empTable').DataTable().destroy();
    loadTable()
    toastr.success(data.message);
    $("#modalUsers").modal("hide");
  }).fail(function(data) {
    toastr.warning(data.responseJSON.message);
  })
}

function update(id)
{
  let url = '{{ url("/update", ":id") }}';
  url = url.replace('%3Aid', id);
  $.ajax({
    _token: "{{ csrf_token() }}",
    method: "PUT",
    data: {name: $("#name").val(), email: $("#email").val(), category_id: $("#category_id").val()},
    url: url
  })
  .done(function(data){
    $('#empTable').DataTable().destroy();
    loadTable()
    toastr.success(data.message);
    $("#modalUsers").modal("hide");
  })
}

function deleteUser()
{
  let id = $("#deleteUserId").val();
  let url = '{{ url("/delete", ":id") }}';
  url = url.replace('%3Aid', id);
  $.ajax({
    _token: "{{ csrf_token() }}",
    method: "DELETE",
    url: url
  })
  .done(function(data){
    $('#empTable').DataTable().destroy();
    loadTable()
    toastr.success(data.message);
    $("#deleteEmployeeModal").modal("hide");
  })
}

function modalDelete(id)
{
  $("#deleteUserId").val(id);
  $("#deleteEmployeeModal").modal()
}

function modalUpdate(id = 0)
{
  callModal(id)
}

@if(session('info'))

  toastr.success("{{session('info')}}")

@endif

</script>