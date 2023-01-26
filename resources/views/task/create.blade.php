@extends('layouts.backend')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('public/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/dropzonejs/dist/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/js/plugins/select2/css/select2.min.css') }}">
<style>
.table-task{
    text-align: center;
    font-weight: 600;
}
.btn-add{
    position: absolute;
    bottom: 4px;
}
.submit-simpan{
    text-align: right;
}
.form-group label{
    color: #1d316b;
}
table thead tr th{
    color: #1d316b !important;
    text-transform: none !important;
}
</style>
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('public/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('public/js/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('public/js/pages/be_forms_plugins.min.js') }}"></script>

<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
<script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script>

{{-- table dinamic js --}}
<script>
jQuery(document).delegate('button.btn-add', 'click', function(e) {
    //get value form
    var task = $('#task').val();
    var jam_mulai = $('#jam_mulai').val();
    var jam_selesai = $('#jam_selesai').val();
    var project = $('#project option:selected').text();
    var id_project = $('#project').val();
    var status = 'berhasil';

    //cek value form
    if(task == ''){
        status = 'gagal';
    }

    if(jam_mulai == ''){
        status = 'gagal';
    }

    if(jam_selesai == ''){
        status = 'gagal';
    }

    if(id_project == null){
        status = 'gagal';
    }

    //alert jika kosong input
    if(status == 'gagal'){
        alert('input tidak boleh kosong');
    }else{
        //hapus tr kosong
        jQuery('#table-task >tbody >tr#kosong').remove();

        //hitung jumlah tr
        size = jQuery('#table-task >tbody >tr').length + 1;

        //append tr
        var markup = '<tr id="rec-'+ size +'"><td class="text-center"><span class="sn">'+ size +'</span></td><td>'+ task +'<input type="hidden" name="task[]" value="'+ task +'"></td><td>'+ jam_mulai +'<input type="hidden" name="jam_mulai[]" value="'+ jam_mulai +'"></td><td>'+ jam_selesai +'<input type="hidden" name="jam_selesai[]" value="'+ jam_selesai +'"></td><td>'+ project +'<input type="hidden" name="project[]" value="'+ id_project +'"></td><td class="text-center"><button class="btn btn-icon btn-sm btn-danger btn-delete" data-id="'+ size +'"><i class="fa fa-trash"></i></button></td></tr>';
        $("table tbody").append(markup);

        //kosongkan input setelah submit
        var task = $('#task').val('');
        var jam_mulai = $('#jam_mulai').val('');
        var jam_selesai = $('#jam_selesai').val('');
        var project = $('#project').val('').trigger('change');
    }
});

jQuery(document).delegate('button.btn-delete', 'click', function(e) {
    var id = jQuery(this).attr('data-id');
    jQuery('#rec-' + id).remove();
    $('#tbody_task tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
});
</script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default font-w600">
                Tambah Task {{ ucwords($nama) }}
            </div>
            <div class="block-content">
                <form action="" method="post">
                <div class="form-group row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="tanggal">Tanggal :</label>
                        <input type="text" name="tanggal" id="tanggal" class="js-flatpickr form-control bg-white" placeholder="d-m-Y" data-date-format="d-m-Y" value="{{ date('d-m-Y') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <label for="example-flatpickr-time-standalone-24">Task</label>
                        <input type="text" class="form-control" id="task">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="example-flatpickr-time-standalone-24">Jam Mulai</label>
                        <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="example-flatpickr-time-standalone-24">Jam Selesai</label>
                        <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="example-flatpickr-time-standalone-24">Project</label>
                        <select name="projects" id="project" class="js-select2 form-control">
                            <option value="" selected disabled>Pilih Project</option>
                            @foreach ($project as $key => $data)
                            <option value="{{ $key }}">{{ $data }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <button class="btn btn-icon btn-sm btn-noborder bg-gd-sea btn-add text-white w-100 font-size-sm" id="btn-add" type="button"><i class="fa fa-plus"></i>&nbsp;Tambah Task</button>
                    </div>
                </div>
                @csrf
                <table class="table table-bordered w-100" id="table-task">
                    <thead class="thead-light">
                        <tr>
                            <th width="10%" class="text-center">No</th>
                            <th width="30%">Task</th>
                            <th width="15%">Jam mulai</th>
                            <th width="15%">Jam Selesai</th>
                            <th width="20%">Project</th>
                            <th class="text-center" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_task">
                        <tr id="kosong">
                            <td colspan="6" class="text-center">Task Kosong</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group col-lg-12 submit-simpan">
                    <button type="submit" class="btn btn-noborder bg-gd-aqua text-white btn-sm font-size-sm">Simpan Task</button>
                </div>
                </form>
                {{-- <div style="display:none;">
                    <table id="sample_table">
                        <tr id="">
                        <td><span class="sn"></span>.</td>
                        <td>ABC Posts</td>
                        <td>04</td>
                        <td>21 to 42 years</td>
                        <td>5200-20200/-</td>
                        <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
