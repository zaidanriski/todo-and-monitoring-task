@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('public/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css">
<style>
.table-task{
    text-align: center;
    font-weight: 600;
}
.cke_textarea_inline{
    border: 1px solid #d4dae3;
    border-radius: 0.25rem;
    transition: border-color ease-in-out 0.15s;
    padding: 5px;
}
.date-periode{
    width: 20% !important;
}
/* .flatpickr-innerContainer{
    display: none;
} */
.tahun-periode,.bulan-periode{
    width: 15% !important;
}
.p-7{
    padding: 7px !important;
}
.block-header-gdv{
    padding: 10px 20px !important;
}
thead tr td{
    color: #1d316b;
    font-weight: 600;
}
.img-icon{
    width: 15px;
}
.btn-gdv{
    color: #212529 !important;
    background-color: #ffffff !important;
    border-color: #cbd2dd !important;
}
.btn-group-gdv{
    -webkit-box-shadow: 0px 7px 7px -1px rgba(212,212,212,1);
    -moz-box-shadow: 0px 7px 7px -1px rgba(212,212,212,1);
    box-shadow: 0px 7px 7px -1px rgba(212,212,212,1);
}
.btn-shadow{
    -webkit-box-shadow: 0px 7px 7px -1px rgba(212,212,212,1);
    -moz-box-shadow: 0px 7px 7px -1px rgba(212,212,212,1);
    box-shadow: 0px 7px 7px -1px rgba(212,212,212,1);
}
.page-item.active .page-link{
    background-color: #1d316b !important;
    border-color: #1d316b !important;
}
.page-link{
    color: #1d316b;
}
.dataTables_info{
    display: none;
}
div.dataTables_wrapper {
    width: 100%;
    margin: 0 auto;
}
.pd-3{
    padding: 3px !important;
}
</style>
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('public/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('public/js/plugins/ckeditor/ckeditor.js') }}"></script>

<!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
<script>jQuery(function(){ Codebase.helpers(['flatpickr','summernote', 'ckeditor', 'simplemde']); });</script>

<!-- Page JS Code -->
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script>
<script src="{{ asset('public/js/pages/be_tables_datatables.min.js') }}"></script>
<script>
    //ckeditor 2
    if (jQuery('#js-ckeditor-inline2:not(.js-ckeditor-inline2-enabled)').length) {
        jQuery('#js-ckeditor-inline2').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline2'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline2').addClass('js-ckeditor-inline2-enabled');
    }

    //ckeditor 3
    if (jQuery('#js-ckeditor-inline3:not(.js-ckeditor-inline3-enabled)').length) {
        jQuery('#js-ckeditor-inline3').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline3'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline3').addClass('js-ckeditor-inline3-enabled');
    }

    //ckeditor 4
    if (jQuery('#js-ckeditor-inline4:not(.js-ckeditor-inline4-enabled)').length) {
        jQuery('#js-ckeditor-inline4').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline4'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline4').addClass('js-ckeditor-inline4-enabled');
    }

    //ckeditor 5
    if (jQuery('#js-ckeditor-inline5:not(.js-ckeditor-inline5-enabled)').length) {
        jQuery('#js-ckeditor-inline5').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline5'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline5').addClass('js-ckeditor-inline5-enabled');
    }

    //ckeditor 6
    if (jQuery('#js-ckeditor-inline6:not(.js-ckeditor-inline6-enabled)').length) {
        jQuery('#js-ckeditor-inline6').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline6'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline6').addClass('js-ckeditor-inline6-enabled');
    }

    //ckeditor 7
    if (jQuery('#js-ckeditor-inline7:not(.js-ckeditor-inline7-enabled)').length) {
        jQuery('#js-ckeditor-inline7').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline7'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline7').addClass('js-ckeditor-inline7-enabled');
    }

    //ckeditor 8
    if (jQuery('#js-ckeditor-inline8:not(.js-ckeditor-inline8-enabled)').length) {
        jQuery('#js-ckeditor-inline8').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline8'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline8').addClass('js-ckeditor-inline8-enabled');
    }

    //ckeditor 9
    if (jQuery('#js-ckeditor-inline9:not(.js-ckeditor-inline9-enabled)').length) {
        jQuery('#js-ckeditor-inline9').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline9'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline9').addClass('js-ckeditor-inline9-enabled');
    }

    //ckeditor 10
    if (jQuery('#js-ckeditor-inline10:not(.js-ckeditor-inline10-enabled)').length) {
        jQuery('#js-ckeditor-inline10').attr('contenteditable', 'true');
        CKEDITOR.inline('js-ckeditor-inline10'); // Add .js-ckeditor-inline-enabled class to tag it as activated

        jQuery('#js-ckeditor-inline10').addClass('js-ckeditor-inline10-enabled');
    }

    //datable periode
    $('#table-periode').DataTable({
        scrollY:        "600px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            leftColumns: 2
        }
    });

    $(document).ready(function() {
        // $('.form-problem').hide();
        $('.form-counter').hide();
        $('.form-measer').hide();
        $('.checked-problem').prop('checked', false); // Unchecks it

        $(".checked-problem").change(function() {
            if(this.checked) {
                $('.form-counter').show();
                $('.form-measer').show();
            }else{
                $('.form-counter').hide();
                $('.form-measer').hide();
            }
        });
    });

    $(".edit-status").click(function() {
        $('#id_task').val('');
        // $('#select-status').val(0).change();
        $('#status-task').text('-');
        var editor = CKEDITOR.instances['js-ckeditor-inline'];
        var editor2 = CKEDITOR.instances['js-ckeditor-inline2'];
        editor.setData('');
        editor2.setData('');
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('get-status') }}',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                // $('.form-problem').hide();
                $('.form-counter').hide();
                $('.form-measer').hide();
                $('.checked-problem').prop('checked', false); // Unchecks it

                $('#id_task').val(id);
                // if (data.status == 3) {
                //     $('#select-status').val(2).change();
                // }
                // $('#select-status').val(data.status).change();
                $('#status-task').text(data.status_name);
                if (data.problem == 1) {
                    $('.checked-problem').prop('checked', true).trigger('change'); // Unchecks it
                    var counter = data.counter;
                    var measer = data.measer;
                    var editor = CKEDITOR.instances['js-ckeditor-inline'];
                    var editor2 = CKEDITOR.instances['js-ckeditor-inline2'];
                    editor.setData(counter);
                    editor2.setData(measer);
                }
                // $('#isi-modal').html(data.isi);
                // jQuery('#modal-message').modal('show');
                console.log(data);
                jQuery('#modal-status').modal('show');
            },
            error: function(data) {
                // $('.form-problem').hide();
                $('.form-counter').hide();
                $('.form-measer').hide();
                $('.checked-problem').prop('checked', false); // Unchecks it
                // $('#subject-modal').text('.....');
                // $('#email-modal').text('.....');
                // $('#tanggal-modal').text('.....');
                // $('#isi-modal').text('.....');
                // var errors = $.parseJSON(data);
                console.log(data);
                jQuery('#modal-status').modal('hide');
            }
        });
    });

    //on click button proses
    $(".proses-task").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-status-proses') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    //on click button open task
    $(".open-task").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-status-open') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    $(".edit-cm").click(function() {
        $('#id_task_cm').val('');
        var editor3 = CKEDITOR.instances['js-ckeditor-inline3'];
        var editor4 = CKEDITOR.instances['js-ckeditor-inline4'];
        editor3.setData('');
        editor4.setData('');
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('get-status') }}',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#id_task_cm').val(id);
                var counter = data.counter;
                var measer = data.measer;
                var editor3 = CKEDITOR.instances['js-ckeditor-inline3'];
                var editor4 = CKEDITOR.instances['js-ckeditor-inline4'];
                editor3.setData(counter);
                editor4.setData(measer);
                console.log(data);
            },
            error: function(data) {
                console.log(errors);
            }
        });
    });

    $(".add-cm").click(function() {
        $('#id_task_cm_delay').val('');
        var editor3 = CKEDITOR.instances['js-ckeditor-inline7'];
        var editor4 = CKEDITOR.instances['js-ckeditor-inline8'];
        editor3.setData('');
        editor4.setData('');
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('get-status') }}',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#id_task_cm_delay').val(id);
                var counter = data.counter;
                var measer = data.measer;
                var editor3 = CKEDITOR.instances['js-ckeditor-inline7'];
                var editor4 = CKEDITOR.instances['js-ckeditor-inline8'];
                editor3.setData(counter);
                editor4.setData(measer);
                console.log(data);
                jQuery('#modal-add-cm-delay').modal('show');
            },
            error: function(data) {
                $('#id_task_cm_delay').val('');
                var editor3 = CKEDITOR.instances['js-ckeditor-inline7'];
                var editor4 = CKEDITOR.instances['js-ckeditor-inline8'];
                editor3.setData('');
                editor4.setData('');
                console.log(data);
            }
        });
    });

    //ubah status ke monitor
    $(".monitor-task").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-status-monitor') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    //ubah status ke checked ontime
    $(".checked-ontime").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-status-checked-ontime') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    //ubah status ke checked delay
    $(".checked-delay").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-status-checked-delay') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    //hapus task
    $(".hapus-task").click(function() {
        Swal.fire({
          title: 'Hapus Task?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            var id = $(this).attr("data-id");
            var user = $(this).attr("data-user");
            console.log(id);
            console.log(user);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ url('delete-task') }}',
                data: {
                    id: id,
                    user: user
                },
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                    title: 'Berhasil Delete Task',
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
                    title: 'Gagal Delete Task',
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

    //ubah problem ke done
    $(".problem-done").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-problem-done') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    //hapus Problem
    $(".hapus-cm").click(function() {
        Swal.fire({
          title: 'Hapus Counter Measure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            var id = $(this).attr("data-id");
            var user = $(this).attr("data-user");
            console.log(id);
            console.log(user);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ url('delete-problem') }}',
                data: {
                    id: id,
                    user: user
                },
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                    title: 'Berhasil Hapus Counter Measure',
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
                    title: 'Gagal Hapus Counter Measure',
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

    //edit reminder
    $(".edit-reminder").click(function() {
        $('#id_reminder').val('');
        var editor3 = CKEDITOR.instances['js-ckeditor-inline10'];
        editor3.setData('');
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('get-reminder') }}',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#id_reminder').val(id);
                var tanggal = data.due_date;
                var note = data.note;
                var editor3 = CKEDITOR.instances['js-ckeditor-inline10'];
                editor3.setData(note);
                $('#target_finish').val(tanggal);
                console.log(data);
                jQuery('#modal-edit-reminder').modal('show');
            },
            error: function(data) {
                console.log(errors);
            }
        });
    });
    //hapus Reminder
    $(".hapus-reminder").click(function() {
        Swal.fire({
          title: 'Hapus Reminder?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            var id = $(this).attr("data-id");
            var user = $(this).attr("data-user");
            console.log(id);
            console.log(user);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ url('delete-reminder') }}',
                data: {
                    id: id,
                    user: user
                },
                dataType: 'json',
                success: function(data) {
                Swal.fire({
                    title: 'Berhasil Delete Note',
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
                    title: 'Gagal Delete Note',
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

    //on click Note Done
    $(".done-reminder").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-reminder-done') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });

    //on click Note Open
    $(".open-reminder").click(function() {
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        console.log(id);
        console.log(user);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ url('update-reminder-open') }}',
            data: {
                id: id,
                user: user
            },
            dataType: 'json',
            success: function(data) {
                Swal.fire({
                title: 'Berhasil Update Status',
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
                title: 'Gagal Update Status',
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
    });
</script>
@endsection

@section('content')
    @php
    $role = Auth::user()->role;
    if ($role == 1) {
        $link_add = '';
    }else{
        $link_add = '/'.$id_user;
    }
    if ($bulan_periode != "" && $tahun_periode != "") {
        $get_add = '&bulan-periode='.$bulan_periode.'&tahun-periode='.$tahun_periode;
    }else{
        $get_add = '';
    }
    @endphp
    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="block">
                    <div class="block-header block-header-default block-header-gdv">
                        <form action="" method="get" class="form form-inline w-100">
                            <h3 class="block-title font-w600"><i class="font-w600 font-size-xl si si-calendar"></i> Periode Task</h3>
                            <select name="bulan-periode" id="bulan-periode" class="form-control bulan-periode">
                                <option value="1" {{ $bulan_periode == '1' ? 'selected' : '' }}>Janurai</option>
                                <option value="2" {{ $bulan_periode == '2' ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ $bulan_periode == '3' ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ $bulan_periode == '4' ? 'selected' : '' }}>April</option>
                                <option value="5" {{ $bulan_periode == '5' ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ $bulan_periode == '6' ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ $bulan_periode == '7' ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ $bulan_periode == '8' ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ $bulan_periode == '9' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ $bulan_periode == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ $bulan_periode == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $bulan_periode == '12' ? 'selected' : '' }}>Desember</option>
                            </select>&nbsp;
                            <input type="number" name="tahun-periode" id="tahun-periode" class="form-control tahun-periode" value="{{ $tahun_periode }}">&nbsp;<button type="submit" class="btn btn-primary btn-noborder bg-gd-sea font-size-sm"> Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12">
                <div class="row gutters-tiny">
                    <div class="col-md-3">
                        <a class="block block-link-shadow" href="{{ url('profile') }}">
                            <div class="block-content block-content-full clearfix bg-image" style="background-image: url('{{ asset('public/media/bg-user.png') }}');">
                                <div class="text-center float-right mt-10 mx-15">
                                    <div class="font-size-xl font-w600 text-white">{{ ucwords($data->name) }}</div>
                                </div>
                                <div class="float-left">
                                    <img class="img-avatar" src="{{ $data->image == "" ? asset('public/media/avatars/avatar15.jpg') : asset('storage/data/profile/'.$data->image) }}" alt="">
                                </div>
                            </div>
                            <div class="block-content block-content-full bg-body-light text-center pd-3">
                                <button type="button" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                    <i class="fa fa-user"></i>
                                </button>
                                <button type="button" class="btn btn-circle btn-alt-primary mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Settings">
                                    <i class="fa fa-cog"></i>
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a class="block" href="{{ url('detail-task'.$link_add.'?tab=today'.$get_add) }}">
                            <div class="block">
                                <div class="block bg-gd-sea text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Today</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-6 border-r">
                                        <div class="font-size-h3 font-w600 text-primary">{{ $task_due_today }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Due</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="font-size-h3 font-w600 text-primary">{{ $task_check_today }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Check</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a class="block" href="{{ url('detail-task'.$link_add.'?tab=delay'.$get_add) }}">
                            <div class="block">
                                <div class="block bg-gd-cherry text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Delay</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-6 border-r">
                                        <div class="font-size-h3 font-w600 text-danger">{{ $task_due_delay }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Due</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="font-size-h3 font-w600 text-danger">{{ $task_check_delay }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Check</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a class="block" href="{{ url('detail-task'.$link_add.'?tab=finish'.$get_add) }}">
                            <div class="block">
                                <div class="block bg-gd-lake text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Finish</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-6 border-r">
                                        <div class="font-size-h3 font-w600 text-success">{{ $task_due_finish }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Due</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="font-size-h3 font-w600 text-success">{{ $task_check_finish }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Check</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a class="block" href="{{ url('detail-task'.$link_add.'?tab=problem'.$get_add) }}">
                            <div class="block">
                                <div class="block bg-gd-sun text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Problem</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-6 border-r">
                                        <div class="font-size-h3 font-w600 text-warning">{{ $task_problem }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Overdue</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="font-size-h3 font-w600 text-warning">{{ $task_problem_done }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Done</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a class="block" href="{{ url('detail-task'.$link_add.'?tab=reminder'.$get_add) }}">
                            <div class="block">
                                <div class="block bg-pulse-dark text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Reminder</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black">{{ $task_reminder_open }}</div>
                                        <div class="font-size-sm font-w600 text-muted">Open</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-xl-9">
            </div> --}}
            <div class="col-lg-12 col-sm-12">
                <!-- Block Tabs Animated Fade -->
                @php
                $active_cm = '';
                $active_task = '';
                if (request()->has('page')) {
                    $active_cm = 'active';
                }else{
                    $active_task = 'active';
                }
                @endphp
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-block">
                        <li class="nav-item">
                            <a class="nav-link {{ $tab == 'today' ? 'active' : '' }}" href="{{ url('detail-task'.$link_add.'?tab=today'.$get_add) }}">Daily Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($tab, ['all-task','delay','finish']) ? 'active' : '' }}" href="{{ url('detail-task'.$link_add.'?tab=all-task'.$get_add) }}">All Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($tab, ['all-task-periode']) ? 'active' : '' }}" href="{{ url('detail-task'.$link_add.'?tab=all-task-periode'.$get_add) }}">All Task Periode</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($tab, ['problem']) ? 'active' : '' }}" href="{{ url('detail-task'.$link_add.'?tab=problem'.$get_add) }}">Problem Counter Measer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($tab, ['reminder']) ? 'active' : '' }}" href="{{ url('detail-task'.$link_add.'?tab=reminder'.$get_add) }}">Reminder</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content overflow-hidden">
                        <div class="tab-pane fade {{ $tab == 'today' ? 'show active' : '' }}" id="btabs-animated-fade-daily" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default block-header-gdv">
                                    <h3 class="block-title font-w600"><i class="font-w600 font-size-xl si si-calendar"></i> Daily Task</h3>
                                    <b class="ml-auto mr-10">{{ tgl_indo($tanggal,true) }}</b>
                                    @if (in_array(Auth::user()->role,[2,3,4]))
                                        <a href="{{ url('tambah-task/'.$data->id) }}" class="btn btn-icon btn-sm ml-auto btn-noborder bg-gd-aqua text-white"><i class="fa fa-fw fa-plus font-size-sm"></i> Tambah</a>
                                    @else
                                        <a href="{{ url('tambah-task') }}" class="btn btn-icon btn-sm ml-auto btn-noborder bg-gd-aqua text-white"><i class="fa fa-fw fa-plus font-size-sm"></i> Tambah</a>    
                                    @endif
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-simple table-responsive">
                                        <thead>
                                            <tr>
                                                <td style="width: 5%;" class="text-center">#</td>
                                                <td style="width: 40%;">Task</td>
                                                <td style="width: 10%;" class="text-center">Jam Mulai</td>
                                                <td style="width: 10%;" class="text-center">Jam Selesai</td>
                                                <td style="width: 10%;" class="text-center">Project</td>
                                                <td style="width: 5%;" class="text-center">Status</td>
                                                <td style="width: 5%;" class="text-center">Status Check</td>
                                                <td class="text-center" style="width: 15%;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $status = array(
                                                    '0' => 'Open',
                                                    '1' => 'On Going',
                                                    '2' => 'Waiting Check',
                                                    '3' => 'On Time',
                                                    '4' => 'Delay',
                                                );
                                                $status_badge = array(
                                                    '0' => 'badge-secondary',
                                                    '1' => 'badge-warning',
                                                    '2' => 'badge-primary',
                                                    '3' => 'badge-success',
                                                    '4' => 'badge-danger',
                                                );

                                                $status_check = array(
                                                    '0' => 'Not Check',
                                                    '1' => 'Monitor',
                                                    '2' => 'Checked OnTime',
                                                    '3' => 'Checked Delay'
                                                );
                                                $status_check_badge = array(
                                                    '0' => 'badge-secondary',
                                                    '1' => 'badge-success',
                                                    '2' => 'badge-primary',
                                                    '3' => 'badge-danger',
                                                );
                                            @endphp
                                            @foreach ($task_daily as $key => $datas)
                                                <tr>
                                                    <td class="text-center">{{ $key++ + 1 }}</td>
                                                    <td>{{ $datas->task }}</td>
                                                    <td>{{ $datas->jam_mulai }}</td>
                                                    <td>{{ $datas->jam_selesai }}</td>
                                                    <td>{{ $datas->project_name }}</td>
                                                    <td>
                                                        <span class="badge {{ $status_badge[$datas->status] }}">{{ $status[$datas->status] }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $status_check_badge[$datas->status_check] }}">{{ $status_check[$datas->status_check] }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if (in_array(Auth::user()->role,[2,3,4]))
                                                        <div class="btn-group btn-group-sm btn-group-gdv" role="group" aria-label="btnGroup1">
                                                            <button type="button" class="btn btn-gdv btn-icon monitor-task" data-toggle="tooltip" data-placement="left" title="Update Status Check to Monitor" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-desktop font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon checked-ontime" data-toggle="tooltip" data-placement="left" title="Update Status Check to Checked Ontime" id="edit-status-ontime" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-calendar-check-o font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon checked-delay" data-toggle="tooltip" data-placement="left" title="Update Status Check to Checked Delay" id="edit-status-delay" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-calendar-times-o font-size-md text-primary"></i></button>
                                                        </div>     
                                                        @else
                                                        <div class="btn-group btn-group-sm btn-group-gdv" role="group" aria-label="btnGroup1">
                                                            @if($datas->status == 0)
                                                            <button type="button" class="btn btn-gdv btn-icon proses-task" data-toggle="tooltip" data-placement="left" title="Proses Task" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><img src="{{ asset('public/media/icon/icon-1.png') }}" alt="" class="img img-icon"></button>
                                                            @else
                                                            <button type="button" class="btn btn-gdv btn-icon open-task" data-toggle="tooltip" data-placement="left" title="Update Status to Open Task" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><img src="{{ asset('public/media/icon/icon-1.png') }}" alt="" class="img img-icon"></button>
                                                            @endif
                                                            <button type="button" class="btn btn-gdv btn-icon finish-task edit-status" data-toggle="tooltip" data-placement="left" title="Finish Task" id="edit-status" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><img src="{{ asset('public/media/icon/icon-2.png') }}" alt="" class="img img-icon"></button>
                                                            <a href="{{ url('edit-task/'.$data->id.'/'.$datas->tanggal) }}" type="button" class="btn btn-gdv btn-icon edit-task" data-toggle="tooltip" data-placement="left" title="Edit Task" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><img src="{{ asset('public/media/icon/icon-4.png') }}" alt="" class="img img-icon"></a>
                                                        </div>    
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ in_array($tab, ['all-task','delay','finish']) ? 'show active' : '' }}" id="btabs-animated-fade-all" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default block-header-gdv">
                                    <h3 class="block-title font-w600"><i class="font-w600 font-size-xl si si-calendar"></i> All Task ({{ count($task_daily_all) }})</h3>
                                    <b class="ml-auto">Periode : {{ tgl_indo($bulan_sebelumnya->toDateString()).' - '.tgl_indo($bulan_sekarang->subDay()->toDateString()) }}</b>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-simple table-responsive">
                                        <thead>
                                            <tr>
                                                <td style="width: 5%;" class="text-center">#</td>
                                                <td style="width: 20%;">Tanggal</td>
                                                <td style="width: 35%;">Task</td>
                                                <td style="width: 10%;">Jam Mulai</td>
                                                <td style="width: 10%;">Jam Selesai</td>
                                                <td style="width: 5%;">Status</td>
                                                <td style="width: 5%;">Status Check</td>
                                                <td class="text-center" style="width: 5%;">Problem</td>
                                                <td class="text-center" style="width: 5%;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $status = array(
                                                    '0' => 'Open',
                                                    '1' => 'On Going',
                                                    '2' => 'Waiting Check',
                                                    '3' => 'On Time',
                                                    '4' => 'Delay',
                                                );
                                                $status_badge = array(
                                                    '0' => 'badge-secondary',
                                                    '1' => 'badge-warning',
                                                    '2' => 'badge-primary',
                                                    '3' => 'badge-success',
                                                    '4' => 'badge-danger',
                                                );

                                                $status_check = array(
                                                    '0' => 'Not Check',
                                                    '1' => 'Monitor',
                                                    '2' => 'Checked OnTime',
                                                    '3' => 'Checked Delay'
                                                );
                                                $status_check_badge = array(
                                                    '0' => 'badge-secondary',
                                                    '1' => 'badge-success',
                                                    '2' => 'badge-primary',
                                                    '3' => 'badge-danger',
                                                );
                                            @endphp
                                            @foreach ($task_daily_all as $key => $datas)
                                                <tr>
                                                    <td>{{ $key++ + 1 }}</td>
                                                    <td>{{ tgl_indo($datas->tanggal) }}</td>
                                                    <td>{{ $datas->task }}</td>
                                                    <td>{{ $datas->jam_mulai }}</td>
                                                    <td>{{ $datas->jam_selesai }}</td>
                                                    <td>
                                                        <span class="badge {{ $status_badge[$datas->status] }}">{{ $status[$datas->status] }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $status_check_badge[$datas->status_check] }}">{{ $status_check[$datas->status_check] }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- <span class="badge badge-pill badge-success"><i class="fa fa-exclamation font-size-xl"></i></span>
                                                        <span class="badge badge-pill badge-danger"><i class="fa fa-remove font-size-xl"></i></span> --}}
                                                        @php
                                                        $problem = '';
                                                        if($datas->problem == 0 && in_array($datas->status_check,[2])){
                                                            $problem = '<span class="badge badge-pill badge-success"><i class="fa fa-check font-size-xl"></i></span>';
                                                        }
                                                        if($datas->problem == 0 && in_array($datas->status_check,[0,1])){
                                                            $problem = '<span class="badge badge-pill badge-success"><i class="fa fa-exclamation font-size-xl px-1"></i></span>';
                                                        }
                                                        if($datas->problem == 0 && $datas->status_check == 0){
                                                            $problem = '<span class="badge badge-pill badge-success"><i class="fa fa-exclamation font-size-xl px-1"></i></span>';
                                                        }
                                                        if($datas->problem == 1){
                                                            $problem = '<span class="badge badge-pill badge-danger"><i class="fa fa-remove font-size-xl"></i></span>';
                                                        }
                                                        if($datas->delay == 1 && $datas->problem == 0){
                                                            $problem = '<span class="badge badge-pill badge-danger"><i class="fa fa-remove font-size-xl"></i></span>';
                                                        }
                                                        echo $problem;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm btn-group-gdv" role="group" aria-label="btnGroup1">
                                                            @if($datas->delay == 1 || $datas->problem == 1)
                                                            <button type="button" class="btn btn-gdv btn-icon add-cm" data-toggle="tooltip" data-placement="left" title="Input Counter Measure" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-pencil font-size-md text-primary"></i></button>
                                                            @endif
                                                            @if (in_array(Auth::user()->role,[2,3,4]))
                                                            <button type="button" class="btn btn-gdv btn-icon monitor-task" data-toggle="tooltip" data-placement="left" title="Update Status Check to Monitor" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-desktop font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon checked-ontime" data-toggle="tooltip" data-placement="left" title="Update Status Check to Checked Ontime" id="edit-status-ontime" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-calendar-check-o font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon checked-delay" data-toggle="tooltip" data-placement="left" title="Update Status Check to Checked Delay" id="edit-status-delay" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-calendar-times-o font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon hapus-task" data-toggle="tooltip" data-placement="left" title="Hapus Task" id="edit-status-delay" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-trash font-size-md text-primary"></i></button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ in_array($tab, ['all-task-periode']) ? 'show active' : '' }}" id="btabs-animated-fade-periode" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default block-header-gdv">
                                    <form action="" method="get" class="form form-inline w-100">
                                        <h3 class="block-title font-w600"><i class="font-w600 font-size-xl si si-calendar"></i> All Task Periode</h3>
                                        <select name="bulan-periode" id="bulan-periode" class="form-control bulan-periode">
                                            <option value="1" {{ $bulan_periode == '1' ? 'selected' : '' }}>Janurai</option>
                                            <option value="2" {{ $bulan_periode == '2' ? 'selected' : '' }}>Februari</option>
                                            <option value="3" {{ $bulan_periode == '3' ? 'selected' : '' }}>Maret</option>
                                            <option value="4" {{ $bulan_periode == '4' ? 'selected' : '' }}>April</option>
                                            <option value="5" {{ $bulan_periode == '5' ? 'selected' : '' }}>Mei</option>
                                            <option value="6" {{ $bulan_periode == '6' ? 'selected' : '' }}>Juni</option>
                                            <option value="7" {{ $bulan_periode == '7' ? 'selected' : '' }}>Juli</option>
                                            <option value="8" {{ $bulan_periode == '8' ? 'selected' : '' }}>Agustus</option>
                                            <option value="9" {{ $bulan_periode == '9' ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ $bulan_periode == '10' ? 'selected' : '' }}>Oktober</option>
                                            <option value="11" {{ $bulan_periode == '11' ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ $bulan_periode == '12' ? 'selected' : '' }}>Desember</option>
                                        </select>&nbsp;
                                        <input type="number" name="tahun-periode" id="tahun-periode" class="form-control tahun-periode" value="{{ $tahun_periode }}">&nbsp;<button type="submit" class="btn btn-primary btn-noborder bg-gd-sea font-size-sm"> Filter</button>
                                    </form>
                                </div>
                                <div class="block-content block-content-full">
                                    <table id="table-periode" class="table table-bordered nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <td style="width: 5%;" class="text-center" rowspan="2">#</td>
                                                <td style="width: 40%;" rowspan="2">Task</td>
                                                <td style="width: 10%;" rowspan="2">Jam Mulai</td>
                                                <td style="width: 10%;" rowspan="2">Jam Selesai</td>
                                                <td colspan="{{ count($tanggal_periode) }}" class="text-center">Tanggal</td>
                                            </tr>
                                            <tr>
                                            @foreach ($tanggal_periode as $date)
                                                <td>{{ $date->format('d') }}</td>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $status = array(
                                                    '0' => 'O',
                                                    '1' => 'OG',
                                                    '2' => 'WC',
                                                    '3' => 'OT',
                                                    '4' => 'D',
                                                );
                                                $status_badge = array(
                                                    '0' => 'badge-secondary',
                                                    '1' => 'badge-warning',
                                                    '2' => 'badge-primary',
                                                    '3' => 'badge-success',
                                                    '4' => 'badge-danger',
                                                );
                                                $tooltip_status = array(
                                                    '0' => 'Open',
                                                    '1' => 'On Going',
                                                    '2' => 'Waiting Check',
                                                    '3' => 'On Time',
                                                    '4' => 'Delay',
                                                );

                                                $status_check = array(
                                                    '0' => 'NC',
                                                    '1' => 'M',
                                                    '2' => 'CO',
                                                    '3' => 'CD'
                                                );
                                                $status_check_badge = array(
                                                    '0' => 'badge-secondary',
                                                    '1' => 'badge-success',
                                                    '2' => 'badge-primary',
                                                    '3' => 'badge-danger',
                                                );
                                                $tooltip_status_check = array(
                                                    '0' => 'Not Check',
                                                    '1' => 'Monitor',
                                                    '2' => 'Checked OnTime',
                                                    '3' => 'Checked Delay'
                                                );
                                                $no = 1;
                                            @endphp
                                            @foreach ($task_daily_all as $key => $datas)
                                                @php
                                                @endphp
                                                <tr>
                                                    <td>{{ str_pad($no, 4, '0', STR_PAD_LEFT) }}</td>
                                                    <td>{{ $datas->task }}</td>
                                                    <td>{{ $datas->jam_mulai }}</td>
                                                    <td>{{ $datas->jam_selesai }}</td>
                                                    @foreach ($tanggal_periode as $date)
                                                        @if ($datas->tanggal == $date->format('Y-m-d'))
                                                            <td>
                                                                {{-- @if ($datas->delay)
                                                                    @if (in_array($datas->status,[2,3]))
                                                                        <span class="badge {{ $status_badge[$datas->status] }}" data-toggle="tooltip" data-placement="left" title="{{ $tooltip_status[$datas->status] }}">{{ $status[$datas->status] }}</span>
                                                                    @endif
                                                                    <span class="badge badge-danger" data-toggle="tooltip" data-placement="left" title="Delay">D</span>
                                                                @else --}}
                                                                    <span class="badge {{ $status_badge[$datas->status] }}" data-toggle="tooltip" data-placement="left" title="{{ $tooltip_status[$datas->status] }}">{{ $status[$datas->status] }}</span>
                                                                    <br>
                                                                    <span class="badge {{ $status_check_badge[$datas->status_check] }}" data-toggle="tooltip" data-placement="left" title="{{ $tooltip_status_check[$datas->status_check] }}">{{ $status_check[$datas->status_check] }}</span>
                                                                {{-- @endif --}}
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                @php
                                                $no++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ in_array($tab, ['problem']) ? 'show active' : '' }}" id="btabs-animated-fade-problem" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default block-header-gdv">
                                    <h3 class="block-title font-w600"><i class="font-w600 font-size-xl si si-calendar"></i> Problem Counter Measure</h3>
                                    <button type="button" class="btn btn-noborder btn-sm btn-icon text-white bg-gd-sea" data-toggle="modal" data-target="#modal-add-cm"><i class="fa fa-fw fa-plus"></i> Tambah Counter Measure</button>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-simple table-responsive">
                                        <thead>
                                            <tr>
                                                <td style="width: 5%;" class="text-center">#</td>
                                                <td style="width: 20%;">Tanggal</td>
                                                <td style="width: 30%;">Task</td>
                                                <td style="width: 15%;">Counter</td>
                                                <td style="width: 15%;">Measer</td>
                                                <td style="width: 10%;">Status</td>
                                                <td class="text-center" style="width: 5%;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $status_problem = array(
                                                '0' => 'Overdue',
                                                '1' => 'Done'
                                            );
                                            $status_problem_badge = array(
                                                '0' => 'badge-secondary',
                                                '1' => 'badge-success'
                                            );
                                            @endphp
                                            @foreach ($counter_measer as $key => $datas)
                                                <tr>
                                                    <td>{{ $key++ + 1 }}</td>
                                                    <td>{{ tgl_indo($datas->tanggal) }}</td>
                                                    <td>{{ $datas->task }}</td>
                                                    <td><?php echo $datas->counter ?></td>
                                                    <td><?php echo $datas->measer ?></td>
                                                    <td>
                                                        <span class="badge {{ $status_problem_badge[$datas->status_problem] }}">{{ $status_problem[$datas->status_problem] }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm btn-group-gdv" role="group" aria-label="btnGroup1">
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon add-cm" data-toggle="tooltip" data-placement="left" title="Edit Counter Measure" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-pencil font-size-md text-primary"></i></button>
                                                            @if (in_array(Auth::user()->role,[2,3,4]))
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon problem-done" data-toggle="tooltip" data-placement="left" title="Update Problem Done" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-check font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon hapus-cm" data-toggle="tooltip" data-placement="left" title="Hapus Counter Measer" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-trash font-size-md text-primary"></i></button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ in_array($tab, ['reminder']) ? 'show active' : '' }}" id="btabs-animated-fade-reminder" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default block-header-gdv">
                                    <h3 class="block-title font-w600"><i class="font-w600 font-size-xl si si-calendar"></i> Reminder</h3>
                                    <button type="button" class="btn btn-noborder btn-sm btn-icon text-white bg-gd-sea" data-toggle="modal" data-target="#modal-add-reminder"><i class="fa fa-fw fa-plus"></i> Tambah Reminder</button>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-simple table-responsive">
                                        <thead>
                                            <tr>
                                                <td style="width: 5%;" class="text-center">#</td>
                                                <td style="width: 40%;">Reminder</td>
                                                <td style="width: 30%;">Target Finish</td>
                                                <td style="width: 20%;">Status</td>
                                                <td class="text-center" style="width: 5%;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $status_reminder = array(
                                                '0' => 'Open',
                                                '1' => 'Done',
                                                '2' => 'Overdue',
                                            );
                                            $status_reminder_badge = array(
                                                '0' => 'badge-secondary',
                                                '1' => 'badge-success',
                                                '2' => 'badge-danger',
                                            );
                                            @endphp
                                            @foreach ($reminder as $key => $datas)
                                                @php
                                                //get overdue
                                                $carbon_due_date = new \Carbon\Carbon($datas->due_date);
                                                $carbon_now = \Carbon\Carbon::now();
                                                if ($carbon_due_date >= $carbon_now) {
                                                    $overdue = FALSE;
                                                } else {
                                                    $overdue = TRUE;
                                                }
                                                @endphp
                                                <tr>
                                                    <td>{{ $key++ + 1 }}</td>
                                                    <td><?php echo $datas->note ?></td>
                                                    <td>{{ tgl_indo_timestamp($datas->due_date) }}</td>
                                                    <td>
                                                        @if ($overdue)
                                                        <span class="badge badge-danger">Overdue</span>
                                                        @else
                                                        <span class="badge {{ $status_reminder_badge[$datas->status] }}">{{ $status_reminder[$datas->status] }}</span>    
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm btn-group-gdv" role="group" aria-label="btnGroup1">
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon edit-reminder" data-toggle="tooltip" data-placement="left" title="Edit reminder" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-pencil font-size-md text-primary"></i></button>
                                                            @if ($datas->status == 0)
                                                                <button type="button" class="btn btn-gdv btn-icon btn-icon done-reminder" data-toggle="tooltip" data-placement="left" title="Done Status" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-check-circle font-size-md text-primary"></i></button>
                                                            @else
                                                                <button type="button" class="btn btn-gdv btn-icon btn-icon open-reminder" data-toggle="tooltip" data-placement="left" title="Open Status" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-undo font-size-md text-primary"></i></button>
                                                            @endif
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon hapus-reminder" data-toggle="tooltip" data-placement="left" title="Hapus reminder" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-trash font-size-md text-primary"></i></button>
                                                            {{-- @if (in_array(Auth::user()->role,[2,3,4]))
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon problem-done" data-toggle="tooltip" data-placement="left" title="Update Problem Done" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-check font-size-md text-primary"></i></button>
                                                            <button type="button" class="btn btn-gdv btn-icon btn-icon hapus-cm" data-toggle="tooltip" data-placement="left" title="Hapus Counter Measer" data-id="{{ $datas->id }}" data-user="{{ $data->id }}"><i class="fa fa-trash font-size-md text-primary"></i></button>
                                                            @endif --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Block Tabs Animated Fade -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Modal ubah status -->
    <div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="modal-status" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Finish Task</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="form-group row">
                            <div class="col-md-12">Klik Tombol Update Untuk Finish Task Ini. <br>
                            Jika ada problem silahkan checklist checkbox problem dan isi counter dan measur.</div><br>
                            <div class="col-md-12">Status Task Saat Ini : <b><span id="status-task" class="fw-600"></span></b></div>
                        </div>
                        <form action="{{ url('update-status-task-finish') }}" method="post" name="form-status" id="form-status">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $data->id }}">
                            <input type="hidden" name="id_task" id="id_task">
                            {{-- <div class="form-group row">
                                <label class="col-12" for="example-select">Pilih Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="select-status" name="status">
                                        <option value="0" selected disabled>Pilih status</option>
                                        <option value="1">On Proses</option>
                                        <option value="2">Finish</option>
                                        <option value="4">Delay</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group row form-problem">
                                <div class="col-12">
                                   <label class="css-control css-control-secondary css-checkbox css-checkbox-rounded">
                                        <input type="checkbox" class="css-control-input checked-problem" name="problem">
                                        <span class="css-control-indicator"></span> Ada <strong data-toggle="popover" title="Problem" data-placement="right" data-content="Jika di task ini ada problem maka anda akan mengisi counter and measer.">Problem ?</strong>
                                    </label> 
                                </div>
                            </div>
                            <div class="form-group row form-counter">
                                <label class="col-12" for="counter">Counter</label>
                                <div class="col-12">
                                    <textarea name="counter" id="js-ckeditor-inline"  class="counter"></textarea>
                                </div>
                            </div>
                            <div class="form-group row form-measer">
                                <label class="col-12" for="measer">Measer</label>
                                <div class="col-12">
                                    <textarea name="measer" id="js-ckeditor-inline2" class="measer"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-status">
                     Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Status -->

    <!-- Modal Counter Measer -->
    <div class="modal fade" id="modal-cm" tabindex="-1" role="dialog" aria-labelledby="modal-cm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Ubah Counter Measer</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('update-cm-task') }}" method="post" name="form-cm" id="form-cm">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $data->id }}">
                            <input type="hidden" name="id_task" id="id_task_cm">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Counter</label>
                                <div class="col-12">
                                    <textarea name="counter" id="js-ckeditor-inline3"  class="counter_cm"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="measer">Measer</label>
                                <div class="col-12">
                                    <textarea name="measer" id="js-ckeditor-inline4" class="measer_cm"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-cm">
                     Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Counter Measer-->

    <!-- Modal add Counter Measer -->
    <div class="modal fade" id="modal-add-cm" tabindex="-1" role="dialog" aria-labelledby="modal-add-cm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Tambah Counter Measer</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('add-cm-task') }}" method="post" name="form-add-cm" id="form-add-cm">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $data->id }}">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Tanggal</label>
                                <div class="col-12">
                                    <input type="text" class="js-flatpickr form-control bg-white" id="tanggal-cm" name="tanggal-cm" placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ date('d-m-Y') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="counter">Counter</label>
                                <div class="col-12">
                                    <textarea name="counter" id="js-ckeditor-inline5"  class="counter_cm"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="measer">Measer</label>
                                <div class="col-12">
                                    <textarea name="measer" id="js-ckeditor-inline6" class="measer_cm"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-add-cm">
                     Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Counter Measer-->

    <!-- Modal add Counter Measer Delay -->
    <div class="modal fade" id="modal-add-cm-delay" tabindex="-1" role="dialog" aria-labelledby="modal-add-cm-delay" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Counter Measer</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('add-cm-delay') }}" method="post" name="form-add-cm-delay" id="form-add-cm-delay">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $data->id }}">
                            <input type="hidden" name="id_task" value="{{ $data->id }}" id="id_task_cm_delay">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Counter</label>
                                <div class="col-12">
                                    <textarea name="counter" id="js-ckeditor-inline7"  class="counter_cm"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="measer">Measer</label>
                                <div class="col-12">
                                    <textarea name="measer" id="js-ckeditor-inline8" class="measer_cm"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-add-cm-delay">
                     Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Counter Measer-->

    <!-- Modal add reminder -->
    <div class="modal fade" id="modal-add-reminder" tabindex="-1" role="dialog" aria-labelledby="modal-add-reminder" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Tambah Reminder</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('add-reminder') }}" method="post" name="form-add-reminder" id="form-add-reminder">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $data->id }}">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Note</label>
                                <div class="col-12">
                                    <textarea name="note" id="js-ckeditor-inline9"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="counter">Target Finish</label>
                                <div class="col-12">
                                    <input type="text" class="js-flatpickr form-control bg-white" id="example-flatpickr-datetime-24" name="target" data-enable-time="true" data-time_24hr="true">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-add-reminder">
                     Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Counter Measer-->

    <!-- Modal edit reminder -->
    <div class="modal fade" id="modal-edit-reminder" tabindex="-1" role="dialog" aria-labelledby="modal-edit-reminder" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Edit Reminder</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ url('update-reminder') }}" method="post" name="form-update-reminder" id="form-update-reminder">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ $data->id }}">
                            <input type="hidden" name="id_reminder" id="id_reminder">
                            <div class="form-group row">
                                <label class="col-12" for="counter">Note</label>
                                <div class="col-12">
                                    <textarea name="note" id="js-ckeditor-inline10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="counter">Target Finish</label>
                                <div class="col-12">
                                    <input type="text" class="js-flatpickr form-control bg-white" id="target_finish" name="target" data-enable-time="true" data-time_24hr="true">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-success" form="form-update-reminder">
                     Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Counter Measer-->
@endsection
