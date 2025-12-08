@extends('layouts.auth')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
            <div class="row g-0">
                <div class="col-12">
                    <div class="p-lg-5 p-4">

                     <h2 style="color:red;">✖ ไม่สามารถยืนยันได้</h2>
                        <p>{{ $message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
