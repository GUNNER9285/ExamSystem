@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <br/>
    @include('layouts.flash-message')
    <div class="card">
        <div class="card-header">
            <h5>ข้อที่ {{$exam['id']}} &nbsp; ({{$exam['score']}} คะแนน)</h5>
        </div>
        <div class="card-body">
            <h5>คำถาม {{$exam['question']}}</h5>
            <form action="{{URL::to('/exam/'.$exam['id'].'')}}" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="answer" placeholder="คำตอบ" required="true">
                    <small id="emailHelp" class="form-text text-muted">กรุณาพิมพ์ตัวใหญ่ ตัวเล็ก ให้ถูกต้อง</small>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-success">ส่งคำตอบ</button>
            </form>
        </div>
    </div>
@endsection