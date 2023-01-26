@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('public/js/plugins/magnific-popup/magnific-popup.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('public/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Page JS Helpers (Magnific Popup plugin) -->
    <script>jQuery(function(){ Codebase.helpers('magnific-popup'); });</script>
@endsection

@section('content')
	<!-- Page Content -->
    <!-- User Info -->
    @php
    if ($data->background != "") {
    	$url_background = asset('storage/data/background/'.$data->background);
    }else{
    	$url_background = asset('public/media/photos/photo13@2x.jpg');
    }
    @endphp
    <div class="bg-image bg-image-bottom" style="background-image: url('{{ $url_background }}');">
        <div class="bg-primary-dark-op">
            <div class="block-content block-content-full block-sticky-options">
            	<div class="block-options">
                    <button type="button" class="btn btn-sm btn-rounded btn-outline-info min-width-100 mb-10" data-toggle="modal" data-target="#modal-edit">Edit Profile</button>
                </div>
                <div class="text-center">
                	<!-- Avatar -->
	                <div class="mb-15 js-gallery">
                    	@if($data->image != "")
                        <a class="img-link img-link-zoom-in img-lightbox" href="{{ asset('storage/data/profile/'.$data->image) }}">
                           <img class="img-avatar img-avatar96 img-avatar-thumb img-fluid" src="{{ asset('storage/data/profile/'.$data->image) }}" alt="">
                        </a>
                        @else
                        <a class="img-link img-link-zoom-in img-lightbox" href="{{ asset('public/media/avatars/avatar15.jpg') }}">
                           <img class="img-avatar img-avatar96 img-avatar-thumb img-fluid" src="{{ asset('public/media/avatars/avatar15.jpg') }}" alt="">
                        </a>
                        @endif
	                </div>
	                <!-- END Avatar -->

	                <!-- Personal -->
	                <h1 class="h3 text-white font-w700 mb-5">{{ ucfirst($data->name) }}</h1>
	                <h3 class="h5 text-white-op mb-0">
	                    {{ $data->jabatan == "" ? 'Belum Memasukan Jabatan' : $data->jabatan }} 
	                </h3>
	                <span class="font-w600 font-size-sm text-white">{{ $data->username == "" ? '@username' : $data->username }}</span><br>
		            <span class="font-w600 font-size-sm text-white">{{ $data->email }}</span>
                </div>
                {{-- <a class="text-primary-light" href="javascript:void(0)">@GraphicXspace</a> --}}
                <!-- END Personal -->

                <!-- Actions -->
                {{-- <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5">
                    <i class="fa fa-plus mr-5"></i> Add Friend
                </button>
                <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5">
                    <i class="fa fa-envelope-o mr-5"></i> Message
                </button> --}}
                <!-- END Actions -->
            </div>
            @if($data->bio != "")
            <div class="block-content block-content-full block-content-sm bg-black-op">
            	<div class="row">
	            	<div class="col-md-12 col-sm-12">
	            		<div class="block-content text-center">
	            			<p class="font-size-sm text-white"><?php echo $data->bio; ?></p>
	            		</div>
	            	</div>
            	</div>
            </div>
            @endif
        </div>
    </div>
    <!-- END User Info -->
	<div class="content">
        <!-- Small Grid Gutters -->
        <h2 class="content-heading">Comming Soon</h2>
        <div class="row gutters-tiny">
            <div class="col-3">
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
                <div class="block">
                    <div class="block-content">
                        <p>...</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Small Grid Gutters -->
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">
                            <i class="fa fa-pencil mr-5"></i> Edit Profile
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form class="my-10" action="{{ url('edit-profile/'.$data->id) }}" method="post" enctype="multipart/form-data">
                        	@csrf
                        	<div class="form-group row @error('name') is-invalid @enderror">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Eg : John Doe" value="{{ old('name') == "" ? $data->name : old('name') }}" required="">
                                        <label for="name">Nama</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row @error('email') is-invalid @enderror">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Eg : john@example.com" value="{{ old('email') == "" ? $data->email : old('email') }}" required="">
                                        <label for="email">Email</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row @error('username') is-invalid @enderror">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                    	<div class="input-group-append">
                                            <span class="input-group-text">
                                                @
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Eg : john_doe" value="{{ old('username') == "" ? $data->username : old('username') }}" required="">
                                        <label for="username">Username</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-emoticon-smile"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row @error('jabatan') is-invalid @enderror">
                                <div class="col-12">
                                    <div class="form-material form-material-primary input-group">
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Eg : Manager" value="{{ old('jabatan') == "" ? $data->jabatan : old('jabatan') }}" required="">
                                        <label for="jabatan">Jabatan</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="si si-briefcase"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('jabatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material form-material-primary">
                                        <textarea class="form-control" id="message-msg" name="bio" rows="6" placeholder="Write your bio.."><?php echo $data->bio; ?></textarea>
                                        <label for="message-msg">Bio</label>
                                    </div>
                                    <div class="form-text font-size-sm text-muted">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                </div>
                            </div>
                            <div class="form-group @error('image') is-invalid @enderror row">
                                <div class="col-12">
                                	<label for="custom-file-input">Foto Profile</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="example-file-input-custom" name="image" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group @error('background') is-invalid @enderror row">
                                <div class="col-12">
                                	<label for="custom-file-input">Foto Background</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="example-file-input-custom" name="background" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                    </div>
                                    @error('background')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-send mr-5"></i> Simpan
                                </button>
                                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
