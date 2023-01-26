@extends('layouts.backend')

@section('css_before')
@endsection

@section('js_after')

@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List Project</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    @foreach ($data as $datas)
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-transparent text-center bg-image block-link-pop border border-1" style="background-image: url('{{ asset('public/media/Task Web-logo.png') }}');" href="{{ url('pre-project-detail/'.$datas->id) }}">
                            <div class="block-content block-content-full">
                                {{-- <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar1.jpg" alt=""> --}}
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-black-op mt-100">
                                <div class="font-w600 text-white">{{ $datas->nama }}</div>
                                <div class="font-size-sm text-white-op">{{ $datas->description }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
