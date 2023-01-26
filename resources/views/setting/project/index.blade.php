@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('public/js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('public/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('public/js/pages/be_tables_datatables.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('#table-project').DataTable();
} );
$(".edit-project").click(function() {
    $('#modal-edit  #id_project').val('');
    $('#modal-edit #nama-project').val('');
    $('#modal-edit #description').val('');
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '{{ url('get-data-project') }}',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data.msg == 'berhasil') {
                $('#modal-edit  #id_project').val(id);
                $('#modal-edit #nama-project').val(data.nama);
                $('#modal-edit #description').val(data.description);
                jQuery('#modal-edit').modal('show');
            }else{
                location.reload();
            }
        },
        error: function(data) {
            console.log(data);
            $('#modal-edit  #id_project').val('');
            $('#modal-edit #nama-project').val('');
            $('#modal-edit #description').val('');
            jQuery('#modal-edit').modal('hide');
        }
    });
});
$(".delete-project").click(function() {
    Swal.fire({
        title: 'Hapus Project?',
        text: "Project Akan di hapus Permanen!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Project'
    }).then((result) => {
    if (result.value) {
        var id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('hapus-project') }}',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if (data.msg == 'berhasil') {
                    Swal.fire(
                        'Deleted!',
                        'Project Berhasil Di Hapus.',
                        'success'
                    );
                    $('tr#'+ id).remove();
                }else{
                    Swal.fire(
                        'Error!',
                        'Project Gagal Di Hapus.',
                        'error'
                    );
                }
            },
            error: function(data) {
                console.log(data);
                Swal.fire(
                    'Error!',
                    'Project Gagal Di Hapus.',
                    'error'
                );
            }
        });
    }
    })
});
</script>
@endsection

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Master Project</h3>
            <button type="button" class="ml-auto btn btn-primary btn-icon btn-sm" data-toggle="modal" data-target="#modal-compose"><i class="fa fa-fw fa-plus"></i> Tambah Project</button>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-simple class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table id="table-project" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $datas)
                        <tr id="{{ $datas->id }}">
                            <td>{{ $key++ + 1 }}</td>
                            <td>{{ $datas->nama }}</td>
                            <td>{{ $datas->description }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="btnGroup1">
                                    <button type="button" type="button" class="btn btn-primary btn-icon edit-project" data-toggle="tooltip" data-placement="left" title="Edit Project" data-id="{{ $datas->id }}"><i class="fa fa-fw fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon delete-project" data-toggle="tooltip" data-placement="left" title="Delete Project" id="delete-project" data-id="{{ $datas->id }}"><i class="fa fa-fw fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Compose Modal -->
<div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-labelledby="modal-compose" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">
                        <i class="fa fa-plus mr-5"></i> New Project
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class="my-10" action="{{ url('tambah-project') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="project">Nama Project</label>
                                <input type="text" class="form-control" id="project" name="nama-project" placeholder="Masukan Nama Project">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="description-add">Deskripsi</label>
                            <div class="col-12">
                                <textarea class="form-control" id="description-add" name="description" rows="7" placeholder="Masukan deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">
                                <i class="fa fa-plus mr-5"></i> Tambah Project
                            </button>
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Compose Modal -->

{{-- modal edit project --}}
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit Task</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{ url('edit-project') }}" method="post" name="form-edit" id="form-edit">
                        @csrf
                        <input type="hidden" name="id_project" id="id_project">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="nama-project">Nama Project</label>
                                <input type="text" class="form-control" id="nama-project" name="nama-project" placeholder="Masukan Nama Project">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="description">Deskripsi</label>
                            <div class="col-12">
                                <textarea class="form-control" id="description" name="description" rows="7" placeholder="Masukan deskripsi"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-alt-success" form="form-edit">
                 Update
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
