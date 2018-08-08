<div class="jumbotron jumbotron-fluid margin-bottom-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-10 offset-md-1 text-main">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
{{--
<style>
    .offset-md-1 {
        margin-left: 8.3333% !important;
    }
</style>--}}
@section('styles')
    <style>
        .offset-md-1 {
            margin-left: 8.3333% !important;
        }

        .text-main {
            color: #fff;
            justify-content: center;
            text-align: center;
        }

        .margin-bottom-0 {
            margin-bottom: 0px;
        }
    </style>
@endsection