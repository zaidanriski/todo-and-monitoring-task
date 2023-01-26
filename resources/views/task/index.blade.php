@extends('layouts.backend')

@section('css_before')
<style>
.table-task{
    text-align: center;
    font-weight: 600;
}
</style>
@endsection

@section('js_after')

@endsection

@section('content')
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

            <div class="col-lg-12">
                <!-- Block Tabs Animated Fade -->
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#btabs-animated-fade-home">User</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <b class="nav-link" >Periode : {{ tgl_indo($bulan_sebelumnya->toDateString()).' - '.tgl_indo($bulan_sekarang->subDay()->toDateString()) }}</b>
                        </li>
                    </ul>
                    <div class="block-content tab-content overflow-hidden">
                        <div class="tab-pane fade show active" id="btabs-animated-fade-home" role="tabpanel">
                            <div class="row">
                            @if (in_array(Auth::user()->role,[2,3,4]))
                                @foreach ($data_user as $datas)
                                    <div class="col-md-6 col-xl-3">
                                        <div class="block block-themed text-center border border-light">
                                            <div class="block-content block-content-full block-sticky-options pt-30 bg-image" style="background-image: url('{{ asset('public/media/bg-user.png') }}');">
                                                <div class="block-options">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-fw fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if (in_array(Auth::user()->role,[2,3,4]))
                                                            <a class="dropdown-item" href="{{ url('tambah-task/'.$datas->id)  }}">
                                                                <i class="fa fa-fw fa-plus mr-5"></i>Tambah Task
                                                            </a>
                                                            @else
                                                            <a class="dropdown-item" href="{{ url('tambah-task')  }}">
                                                                <i class="fa fa-fw fa-plus mr-5"></i>Tambah Task
                                                            </a>    
                                                            @endif
                                                            <a class="dropdown-item" href="{{ url('detail-task/'.$datas->id)  }}">
                                                                <i class="fa fa-fw fa-align-justify mr-5"></i>Detail
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img class="img-avatar img-avatar-thumb" src="{{ $datas->image == "" ? asset('public/media/avatars/avatar15.jpg') : asset('storage/data/profile/'.$datas->image) }}" alt="">
                                            </div>
                                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                                <div class="font-w600 font-size-xl"><a class="dropdown-item" href="{{ url('detail-task/'.$datas->id)  }}">{{ ucwords($datas->name) }}</a></div>
                                            </div>
                                            <div class="block-content">
                                                <div class="row items-push">
                                                    <div class="col-md-12">
                                                        <table class="table-task table-bordered w-100">
                                                            <tr>
                                                                <td></td>
                                                                <td>Due</td>
                                                                <td>Check</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Today</td>
                                                                <td><span class="badge badge-primary"><span class="px-1">{{ $chart_user[$datas->id]['task_due_today'] }}</span></span></td>
                                                                <td><span class="badge badge-primary"><span class="px-1">{{  $chart_user[$datas->id]['task_check_today'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delay</td>
                                                                <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$datas->id]['task_due_delay'] }}</span></span></td>
                                                                <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$datas->id]['task_check_delay'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Finish</td>
                                                                <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$datas->id]['task_due_finish'] }}</span></span></td>
                                                                <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$datas->id]['task_check_finish'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Problem</td>
                                                                <td colspan="2"><span class="badge badge-warning"><span class="px-1">{{ $chart_user[$datas->id]['task_problem'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Note</td>
                                                                <td colspan="2"><span class="badge badge-secondary"><span class="px-1">{{ $chart_user[$datas->id]['task_reminder_open'] }}</span></span></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-6 col-xl-3">
                                    <div class="block block-themed text-center border border-light">
                                        <div class="block-content block-content-full block-sticky-options pt-30 bg-image" style="background-image: url('{{ asset('public/media/bg-user.png') }}');">
                                            <div class="block-options">
                                                <div class="dropdown">
                                                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('tambah-task')  }}">
                                                            <i class="fa fa-fw fa-plus mr-5"></i>Tambah Task
                                                        </a>
                                                        <a class="dropdown-item" href="{{ url('detail-task')  }}">
                                                            <i class="fa fa-fw fa-align-justify mr-5"></i>Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="img-avatar img-avatar-thumb" src="{{ $data->image == "" ? asset('public/media/avatars/avatar15.jpg') : asset('storage/data/profile/'.$data->image) }}" alt="">
                                        </div>
                                        <div class="block-content block-content-full block-content-sm bg-body-light">
                                            <div class="font-w600 font-size-xl">{{ ucwords($data->name) }}</div>
                                            <div class="font-size-sm text-secondary">{{ $divisi[$data->divisi] }}</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="row items-push">
                                                <div class="col-md-12">
                                                    <table class="table-task table-bordered w-100">
                                                        <tr>
                                                            <td></td>
                                                            <td>Due</td>
                                                            <td>Check</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Today</td>
                                                            <td><span class="badge badge-primary"><span class="px-1">{{ $chart_user[$data->id]['task_due_today'] }}</span></span></td>
                                                            <td><span class="badge badge-primary"><span class="px-1">{{  $chart_user[$data->id]['task_check_today'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delay</td>
                                                            <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$data->id]['task_due_delay'] }}</span></span></td>
                                                            <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$data->id]['task_check_delay'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Finish</td>
                                                            <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$data->id]['task_due_finish'] }}</span></span></td>
                                                            <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$data->id]['task_check_finish'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Problem</td>
                                                            <td colspan="2"><span class="badge badge-warning"><span class="px-1">{{ $chart_user[$data->id]['task_problem'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Note</td>
                                                            <td colspan="2"><span class="badge badge-secondary"><span class="px-1">{{ $chart_user[$data->id]['task_reminder_open'] }}</span></span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="btabs-animated-fade-profile" role="tabpanel">
                            <div class="row">
                            @if (in_array(Auth::user()->role,[2,3,4]))
                                @foreach ($data_user as $datas)
                                    <div class="col-md-6 col-xl-3">
                                        <div class="block block-themed text-center border border-light">
                                            <div class="block-content block-content-full block-sticky-options pt-30 bg-image" style="background-image: url('{{ asset('public/media/bg-user.png') }}');">
                                                <div class="block-options">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-fw fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('tambah-task')  }}">
                                                                <i class="fa fa-fw fa-plus mr-5"></i>Tambah Task
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('detail-task/'.$datas->id)  }}">
                                                                <i class="fa fa-fw fa-align-justify mr-5"></i>Detail
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img class="img-avatar img-avatar-thumb" src="{{ $datas->image == "" ? asset('public/media/avatars/avatar15.jpg') : asset('storage/data/profile/'.$datas->image) }}" alt="">
                                            </div>
                                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                                <div class="font-w600 font-size-xl">{{ ucwords($datas->name) }}</div>
                                            </div>
                                            <div class="block-content">
                                                <div class="row items-push">
                                                    <div class="col-md-12">
                                                        <table class="table-task table-bordered w-100">
                                                            <tr>
                                                                <td></td>
                                                                <td>Due</td>
                                                                <td>Check</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Today</td>
                                                                <td><span class="badge badge-primary"><span class="px-1">{{ $chart_user[$datas->id]['task_due_today'] }}</span></span></td>
                                                                <td><span class="badge badge-primary"><span class="px-1">{{  $chart_user[$datas->id]['task_check_today'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delay</td>
                                                                <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$datas->id]['task_due_delay'] }}</span></span></td>
                                                                <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$datas->id]['task_check_delay'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Finish</td>
                                                                <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$datas->id]['task_due_finish'] }}</span></span></td>
                                                                <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$datas->id]['task_check_finish'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Problem</td>
                                                                <td colspan="2"><span class="badge badge-warning"><span class="px-1">{{ $chart_user[$datas->id]['task_problem'] }}</span></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Note</td>
                                                                <td colspan="2"><span class="badge badge-secondary"><span class="px-1">{{ $chart_user[$datas->id]['task_reminder_open'] }}</span></span></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-6 col-xl-3">
                                    <div class="block block-themed text-center border border-light">
                                        <div class="block-content block-content-full block-sticky-options pt-30 bg-image" style="background-image: url('{{ asset('public/media/bg-user.png') }}');">
                                            <div class="block-options">
                                                <div class="dropdown">
                                                    <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-fw fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('tambah-task')  }}">
                                                            <i class="fa fa-fw fa-plus mr-5"></i>Tambah Task
                                                        </a>
                                                        <a class="dropdown-item" href="{{ url('detail-task')  }}">
                                                            <i class="fa fa-fw fa-align-justify mr-5"></i>Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="img-avatar img-avatar-thumb" src="{{ $data->image == "" ? asset('public/media/avatars/avatar15.jpg') : asset('storage/data/profile/'.$data->image) }}" alt="">
                                        </div>
                                        <div class="block-content block-content-full block-content-sm bg-body-light">
                                            <div class="font-w600 font-size-xl">{{ ucwords($data->name) }}</div>
                                            <div class="font-size-sm text-secondary">{{ $divisi[$data->divisi] }}</div>
                                        </div>
                                        <div class="block-content">
                                            <div class="row items-push">
                                                <div class="col-md-12">
                                                    <table class="table-task table-bordered w-100">
                                                        <tr>
                                                            <td></td>
                                                            <td>Due</td>
                                                            <td>Check</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Today</td>
                                                            <td><span class="badge badge-primary"><span class="px-1">{{ $chart_user[$data->id]['task_due_today'] }}</span></span></td>
                                                            <td><span class="badge badge-primary"><span class="px-1">{{  $chart_user[$data->id]['task_check_today'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delay</td>
                                                            <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$data->id]['task_due_delay'] }}</span></span></td>
                                                            <td><span class="badge badge-danger"><span class="px-1">{{ $chart_user[$data->id]['task_check_delay'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Finish</td>
                                                            <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$data->id]['task_due_finish'] }}</span></span></td>
                                                            <td><span class="badge badge-success"><span class="px-1">{{ $chart_user[$data->id]['task_check_finish'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Problem</td>
                                                            <td colspan="2"><span class="badge badge-warning"><span class="px-1">{{ $chart_user[$data->id]['task_problem'] }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Note</td>
                                                            <td colspan="2"><span class="badge badge-secondary"><span class="px-1">{{ $chart_user[$datas->id]['task_reminder_open'] }}</span></span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Block Tabs Animated Fade -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
