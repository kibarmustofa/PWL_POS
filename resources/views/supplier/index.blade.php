@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Supplier</h3>
    <button onclick="modalAction('{{ url('/supplier/create_ajax') }}')" class="btn btn-success">Tambah Supplier</button>
    <table class="table table-bordered" id="supplier-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#supplier-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('supplier.list') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'supplier_nama', name: 'supplier_nama' },
            { data: 'supplier_alamat', name: 'supplier_alamat' },
            { data: 'supplier_telepon', name: 'supplier_telepon' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
        ]
    });
});

function modalAction(url) {
    $('#myModal').load(url, function() {
        $('#myModal').modal('show');
    });
}
</script>

<div id="myModal" class="modal fade"></div>
@endsection
