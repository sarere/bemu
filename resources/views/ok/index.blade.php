@extends('layouts.master')

@section('title','Beranda')

@section('content')
<span class="hidden" id="count-section">{{count($user)}}</span>

<div class="col-md-12 header">
    <img src="{{{ asset('picture/pelantikan-bemu.jpg') }}}">
</div>
<div class="col-md-8 col-md-offset-1">
    @for ($i = 0; $i < 4; $i++)
        @if($i === 0)
            <?php $title = 'Lembaga Kemahasiswaan' ?>
        @elseif($i === 1)
            <?php $title = 'Unit Kegiatan Mahasiswa' ?>
        @elseif($i === 2)
            <?php $title = 'Unit Kegiatan Kebudayaan' ?>
        @else
            <?php $title = 'Unit Kegiatan Kerohanian' ?>
        @endif
        <div id="section-{{ $data[2] }}" class="main-section profile-title col-md-12 pad-bot-small">
            <a class="glyphicon glyphicon-link link-ico jumper" href="#section-{{ $data[2] }}"></a>
            <h1 class="primary-color display-inline-block">{{$title}}</h1>
        </div>
        <div class="col-md-12 margin-btm-small">
        <?php $data[2]++ ?>
        @foreach ($user as $key => $value)
            @if($value->ok == $title)
                @if ($data[1] === 0)
                    <?php $data[0] = 0 ?>
                @elseif ($data[1] === 1)
                    <?php $data[0] = 75 ?>
                @elseif ($data[1] % 2 === 1)
                    <?php $data[0] = 0 ?>
                @else
                    <?php $data[0] = -75 ?>
                @endif
                <div id="section-{{ $data[2] }}" class="sub-section thumbnail col-md-6" style="margin-top:{{ $data[0] }}px">
                    <div class="thumbnail-photo" style="background-image: url({{{ asset('picture/bemukdw.png') }}})">
                    </div>
                    <div class="thumbnail-content">
                        <h4 id="thumb-header-{{$key}}">{{ $value->name }}</h4>
                        <span class="fa fa-envelope" aria-hidden="true"> {{ $value->email }}</span>
                        <span class="fa fa-envelope" aria-hidden="true"> {{$key}} </span>
                        <span class="fa fa-envelope" aria-hidden="true"> {{$data[1]}}</span>
                    </div>
                </div>
                <?php $data[1]++; $data[2]++?>
            @endif
        @endforeach
        <?php $data[1] = 0 ?>
        </div>
    @endfor
</div>
<div class="col-md-2 sub-nav pad-top">
    <div class="sub-nav-outer">
        <?php $data[2]=0 ?>
        @for ($i = 0; $i < 4; $i++)
            @if($i === 0)
                <?php $title = 'Lembaga Kemahasiswaan' ?>
            @elseif($i === 1)
                <?php $title = 'Unit Kegiatan Mahasiswa' ?>
            @elseif($i === 2)
                <?php $title = 'Unit Kegiatan Kebudayaan' ?>
            @else
                <?php $title = 'Unit Kegiatan Kerohanian' ?>
            @endif
            <a href="#section-{{ $data[2] }}" class="jumper sub-nav-btn btn-outer dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="btn-{{ $data[2] }}">{{$title}}</a>
            <div class="sub-nav-inner" id="costum-dropdown-menu-{{$data[2]}}">
            <?php $data[2]++ ?>

            @foreach ($user as $key => $value)
                @if($value->ok == $title)
                    <a href="#section-{{ $data[2] }}" class="jumper sub-nav-btn-inner btn-inner" id="btn-{{ $data[2] }}">{{ $value->nickname }}</a>
                    <?php $data[2]++ ?>
                @endif
            @endforeach
            </div>
        @endfor
     </div>
</div>
@stop