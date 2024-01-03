<table class="table border" id="{{$id}}">
    <thead class="table-primary">
        <tr>
            <th scope="col">No</th>
            {{$column}}
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>    
@endpush