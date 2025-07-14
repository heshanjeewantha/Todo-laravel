@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-lg-12 text-center">
            <h1 class="page-title">Home<home>
         </div>
    </div>
</div>
@endsection


@push('css')
<style>
    .page-title {
        padding-top: 10vh;
        font-size: 3.5rem;
        color: #4b85bf;
    }
</style>
@endpush