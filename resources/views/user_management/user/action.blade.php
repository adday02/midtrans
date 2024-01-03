@if($row->deleted_at)
    <button class="btn btn-success" onclick="destroy('{{$row->id}}')" ><i class="bx bx-revision"></i> Restore</button>
@else
    <button class="btn btn-warning" onclick="edit('{{$row->id}}')" style="color: white"><i class="bx bx-pencil"></i> Edit</button>
    <button class="btn btn-danger" onclick="destroy('{{$row->id}}')" ><i class="bx bx-trash"></i> Delete</button>
@endif