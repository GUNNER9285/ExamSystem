@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    @foreach($exams as $exam)
        <br/>
        <div class="card">
            <div class="card-header">
                <h5>ข้อที่ {{$exam['id']}} &nbsp; ({{$exam['score']}} คะแนน)</h5>
            </div>
            <div class="card-body">
                <a href="{{URL::to('/exam/'.$exam['id'])}}" class="btn btn-primary">ไปทำข้อสอบ</a>
                @if($score[$exam['id']-1]['status'] == 0)
                    <span class="badge badge-danger">ยังทำไม่สำเร็จ</span>
                @else
                    <span class="badge badge-success">ทำสำเร็จ</span>
                @endif
            </div>
        </div>
    @endforeach
    <br/>
@endsection