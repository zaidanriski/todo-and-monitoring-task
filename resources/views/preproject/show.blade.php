@extends('layouts.backend')

@section('css_before')
<link rel="stylesheet" href="{{ asset('public/js/plugins/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('js_after')
<script src="{{ asset('public/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>jQuery(function(){ Codebase.helpers(['flatpickr','summernote']); });</script>

<script>
$(".edit").click(function() {
    var id = $(this).attr("data-id");
    console.log(id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '{{ url('get-pre-project') }}',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(data) {
            $('#modal-edit #id_catatan').val(id);
            $('#modal-edit #tanggal').val(data.tanggal);
            $('#modal-edit #title').val(data.title);
            var HTMLstring = data.content;
            $('#modal-edit #catatan').summernote('code', HTMLstring);
            console.log(data);
            jQuery('#modal-edit').modal('show');
        },
        error: function(data) {
            console.log(data);
            $('#modal-edit #id_catatan').val('');
            $('#modal-edit #tanggal').val('');
            $('#modal-edit #title').val('');
            $('#modal-edit #catatan').summernote('code', '');
            jQuery('#modal-edit').modal('hide');
        }
    });
});

//hapus task
$(".hapus").click(function() {
        Swal.fire({
          title: 'Hapus Catatan?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            var id = $(this).attr("data-id");
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ url('delete-catatan') }}',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                    title: 'Berhasil Delete Catatan',
                    type: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    }).then((result) => {
                        location.reload();
                    });
                    console.log(data);
                },
                error: function(data) {
                    Swal.fire({
                    title: 'Gagal Delete Catatan',
                    type: 'error',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    }).then((result) => {
                        location.reload();
                    });
                    console.log(data);
                }
            });
          }
        });
    });
</script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">
            <button type="button" class="btn btn-sm btn-rounded btn-success float-right" data-toggle="modal" data-target="#modal-add">Tambah Catatan</button>
            {{ $project->nama }} ({{ count($data) }})
        </h2>
        <div class="row">
            @foreach ($data as $datas)
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ $datas->title }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option edit" data-id="{{ $datas->id }}">
                                <i class="si si-pencil"></i>
                            </button>
                            <button type="button" class="btn-block-option hapus" data-id="{{ $datas->id }}">
                                <i class="si si-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <?php
                            echo $datas->content;
                        ?>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Modal add catatan -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Tambah Catatan</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('add-pre-project') }}" method="post" name="form-add" id="form-add">
                            @csrf
                            <input type="hidden" name="id_project" value="{{ $project->id }}">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Tanggal</label>
                                <div class="col-12">
                                    <input type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ date('d-m-Y') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="title">Title</label>
                                <div class="col-12">
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="catatan">Catatan</label>
                                <div class="col-12">
                                    <textarea name="catatan" class="js-summernote" id="catatan"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-add">
                     Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END add catatan-->

    <!-- Modal edit catatan -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Edit Catatan</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('edit-pre-project') }}" method="post" name="form-edit" id="form-edit">
                            @csrf
                            <input type="hidden" name="id_project" value="{{ $project->id }}">
                            <input type="hidden" name="id_catatan" id="id_catatan">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Tanggal</label>
                                <div class="col-12">
                                    <input type="text" class="js-flatpickr form-control bg-white" id="tanggal" name="tanggal" placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ date('d-m-Y') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="title">Title</label>
                                <div class="col-12">
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="catatan">Catatan</label>
                                <div class="col-12">
                                    <textarea name="catatan" class="js-summernote" id="catatan"></textarea>
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
    <!-- END edit catatan-->
@endsection
