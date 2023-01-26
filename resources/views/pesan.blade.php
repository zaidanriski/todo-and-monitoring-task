@extends('layouts.backend')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('public/js/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('public/js/plugins/simplemde/simplemde.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('public/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('public/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('public/js/plugins/simplemde/simplemde.min.js') }}"></script>

    <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
    <script>jQuery(function(){ Codebase.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>
    <!-- Page JS Helpers (Table Tools helper) -->
    <script>jQuery(function(){ Codebase.helpers('table-tools'); });</script>

    {{-- ajax show message --}}
    <script>
        $(document).ready(function() {
            $("#subject-msg").click(function() {
                var id = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ url('show-message') }}',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#subject-modal').text(data.subject);
                        $('#email-modal').text(data.email);
                        $('#tanggal-modal').text(data.tanggal);
                        $('#isi-modal').html(data.isi);
                        jQuery('#modal-message').modal('show');
                        console.log(data);
                    },
                    error: function(data) {
                        $('#subject-modal').text('.....');
                        $('#email-modal').text('.....');
                        $('#tanggal-modal').text('.....');
                        $('#isi-modal').text('.....');
                        var errors = $.parseJSON('.....');
                        console.log(errors);
                    }
                });
            });
        });
    </script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">
            <button type="button" class="btn btn-sm btn-rounded btn-primary d-md-none float-right ml-5" data-toggle="class-toggle" data-target=".js-inbox-nav" data-class="d-none d-md-block">Menu</button>
            <button type="button" class="btn btn-sm btn-rounded btn-success float-right" data-toggle="modal" data-target="#modal-compose">New Message</button>
            Inbox ({{ count($pesan_masuk) }})
        </h2>
        <div class="row">
            <div class="col-md-5 col-xl-3">
                <!-- Collapsible Inbox Navigation -->
                <div class="js-inbox-nav d-none d-md-block">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Navigation</h3>
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-flask mr-5"></i>Filter
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-cogs mr-5"></i>Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <ul class="nav nav-pills flex-column push">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between active" href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-inbox mr-5"></i> Inbox</span>
                                        <span class="badge badge-pill badge-secondary">{{ count($pesan_masuk) }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-star mr-5"></i> Starred</span>
                                        <span class="badge badge-pill badge-secondary">30</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-send mr-5"></i> Sent</span>
                                        <span class="badge badge-pill badge-secondary">79</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-pencil mr-5"></i> Draft</span>
                                        <span class="badge badge-pill badge-secondary">10</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-folder mr-5"></i> Archive</span>
                                        <span class="badge badge-pill badge-secondary">99</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="fa fa-fw fa-trash mr-5"></i> Trash</span>
                                        <span class="badge badge-pill badge-secondary">13</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <hr class="my-5">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-plus mr-5"></i> Create label
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END Collapsible Inbox Navigation -->

                <!-- Recent Contacts -->
                <div class="block d-none d-md-block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Recent Contacts</h3>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-users mr-5"></i> All
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle text-success mr-5"></i> Online
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle text-danger mr-5"></i> Busy
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle text-warning mr-5"></i> Away
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-circle text-muted mr-5"></i> Offline
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-cogs mr-5"></i>Manage
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <ul class="nav-users">
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="{{ asset('public/media/avatars/avatar1.jpg') }}" alt="">
                                    <i class="fa fa-circle text-success"></i> Helen Jacobs
                                    <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> New York</div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="{{ asset('public/media/avatars/avatar12.jpg') }}" alt="">
                                    <i class="fa fa-circle text-success"></i> Jose Wagner
                                    <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> San Fransisco</div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="{{ asset('public/media/avatars/avatar1.jpg') }}" alt="">
                                    <i class="fa fa-circle text-warning"></i> Carol White
                                    <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> Beijing</div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="{{ asset('public/media/avatars/avatar13.jpg') }}" alt="">
                                    <i class="fa fa-circle text-warning"></i> Wayne Garcia
                                    <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> Tokyo</div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="{{ asset('public/media/avatars/avatar11.jpg') }}" alt="">
                                    <i class="fa fa-circle text-danger"></i> Brian Stevens
                                    <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> London</div>
                                </a>
                            </li>
                            <li>
                                <a href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="{{ asset('public/media/avatars/avatar6.jpg') }}" alt="">
                                    <i class="fa fa-circle text-danger"></i> Carol White
                                    <div class="font-w400 font-size-xs text-muted"><i class="fa fa-location-arrow"></i> Rio De Janeiro</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Recent Contacts -->
            </div>
            <div class="col-md-7 col-xl-9">
                <!-- Message List -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <div class="block-title">
                            <strong>1-10</strong> from <strong>23</strong>
                        </div>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option">
                                <i class="si si-arrow-left"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option">
                                <i class="si si-arrow-right"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Messages Options -->
                        <div class="push">
                            <button type="button" class="btn btn-rounded btn-alt-secondary float-right">
                                <i class="fa fa-times text-danger mx-5"></i>
                                <span class="d-none d-sm-inline"> Delete</span>
                            </button>
                            <button type="button" class="btn btn-rounded btn-alt-secondary">
                                <i class="fa fa-archive text-primary mx-5"></i>
                                <span class="d-none d-sm-inline"> Archive</span>
                            </button>
                            <button type="button" class="btn btn-rounded btn-alt-secondary">
                                <i class="fa fa-star text-warning mx-5"></i>
                                <span class="d-none d-sm-inline"> Star</span>
                            </button>
                        </div>
                        <!-- END Messages Options -->

                        <!-- Messages -->
                        <!-- Checkable Table (.js-table-checkable class is initialized in Helpers.tableToolsCheckable()) -->
                        <table class="js-table-checkable table table-hover table-vcenter">
                            <tbody>
                                @foreach($pesan_masuk as $data)
                                <tr>
                                    <td class="text-center" style="width: 40px;">
                                        <label class="css-control css-control-primary css-checkbox">
                                            <input type="checkbox" class="css-control-input">
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="d-none d-sm-table-cell font-w600" style="width: 140px;">{{ $data->nama_pengirim }}</td>
                                    <td>
                                        {{-- <a class="font-w600" id="subject-msg" data-toggle="modal" data-target="#modal-message" href="#" data-id="{{ $data->id }}">{{ \Crypt::decryptString($data->subject) }}</a> --}}
                                        <button type="button" class="btn btn-link p-0" id="subject-msg" href="#" data-id="{{ $data->id }}">{{ \Crypt::decryptString($data->subject) }}</button>
                                        @php
                                            //tampil sebagian isi pesan
                                            $isi = \Crypt::decryptString($data->isi);
                                            $tampil_isi = substr(strip_tags($isi), 0, 50);
                                            $jumlah_isi = strlen($isi);
                                            if ($jumlah_isi >= 50) {
                                                $akhir_isi = '....';
                                            }else{
                                                $akhir_isi = '';
                                            }

                                            // tampil tanggal
                                            $dt = \Carbon\Carbon::now();
                                            $date = $dt->diffForHumans($data->tanggal);
                                        @endphp
                                        <div class="text-muted mt-5"><?php echo $tampil_isi.$akhir_isi; ?></div>
                                    </td>
                                    <td class="d-none d-xl-table-cell font-w600 font-size-sm text-muted" style="width: 120px;">{{ $date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- END Messages -->
                    </div>
                </div>
                <!-- END Message List -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Compose Modal -->
    <div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-labelledby="modal-compose" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">
                            <i class="fa fa-pencil mr-5"></i> New Message
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form class="my-10" action="{{ url('kirim-pesan') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <select name="to" id="to" class="form-control" required="">
                                            <option value="" disabled="" {{ old('to') == '' ? 'selected' : ''}}>Pilih User</option>
                                            @foreach($list_user as $key => $datas)
                                            <option value="{{ $key }}" {{ old('to') == $key ? 'selected' : ''}}>{{ $datas }}</option>
                                            @endforeach
                                        </select>
                                        <label for="message-email">Kirim Ke :</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                   <label class="css-control css-control-secondary css-checkbox css-checkbox-rounded">
                                        <input type="checkbox" class="css-control-input" name="anonim">
                                        <span class="css-control-indicator"></span> Kirim Sebagai <strong data-toggle="popover" title="Kirim Sebagai Anonim" data-placement="right" data-content="Identitas anda tidak akan diketahui oleh orang yang menerima pesan anda.">Anonim</strong>
                                    </label> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <input type="text" class="form-control" id="message-subject" name="subject" placeholder="Perihal Pesan?">
                                        <label for="message-subject">Subject</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-book-open"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="isi">Pesan</label>
                                    <textarea name="isi" id="isi" class="js-summernote-air">Klik Disini untuk edit pesan!</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-send mr-5"></i> Kirim Pesan
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

    <!-- Message Modal -->
    <div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="modal-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title" id="subject-modal">Welcome to our service</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="tooltip" data-placement="left" title="Reply">
                                <i class="fa fa-reply"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full bg-image text-center" style="background-image: url('assets/media/photos/photo6.jpg');">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('public/media/avatars/avatar4.jpg') }}" alt="">
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body font-size-sm">
                        <span class="text-muted float-right"><em id="tanggal-modal">2 min ago</em></span>
                        <a href="javascript:void(0)" id="email-modal">service@example.com</a>
                    </div>
                    <div class="block-content pb-20" id="isi-modal">
                        <p>Dear Customer,</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Best Regards,</p>
                        <p>Danielle Jones</p>
                    </div>
                    {{-- <div class="block-content bg-body">
                        <div class="row gutters-tiny items-push">
                            <div class="col-sm-4">
                                <div class="options-container fx-overlay-slide-down">
                                    <img class="img-fluid options-item" src="{{ asset('public/media/photos/photo20.jpg') }}" alt="">
                                    <div class="options-overlay bg-black-op">
                                        <div class="options-overlay-content">
                                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-secondary min-width-75" href="javascript:void(0)">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="font-size-sm text-muted mt-5">Travel_Pack_1.jpg</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="options-container fx-overlay-slide-down">
                                    <img class="img-fluid options-item" src="{{ asset('public/media/photos/photo21.jpg') }}" alt="">
                                    <div class="options-overlay bg-black-op">
                                        <div class="options-overlay-content">
                                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-secondary min-width-75" href="javascript:void(0)">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="font-size-sm text-muted mt-5">Travel_Pack_2.jpg</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="options-container fx-overlay-slide-down">
                                    <img class="img-fluid options-item" src="{{ asset('public/media/photos/photo22.jpg') }}" alt="">
                                    <div class="options-overlay bg-black-op">
                                        <div class="options-overlay-content">
                                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-secondary min-width-75" href="javascript:void(0)">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="font-size-sm text-muted mt-5">Travel_Pack_3.jpg</div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- END Message Modal -->
@endsection
