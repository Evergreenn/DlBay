@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body container-fluid">
                    @forelse ($files as $name => $data)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                {{--@if ($data['MIME'] === 2)--}}
                                    {{--<div class="embed-responsive embed-responsive-16by9">--}}
                                        {{--<video controls src="{{$data['url']}}" class="embed-responsive-item"></video>--}}
                                    {{--</div>--}}
                                {{--@else--}}
                                    {{--<img src="{{$data['url']}}" alt="...">--}}
                                {{--@endif--}}
                                <div class="caption">
                                    <h4>{{ $name }} </h4>
                                    <small>Uploaded on : {{ $data['lastUpdate'] }}</small>
                                    {{--<p></p>--}}
                                    <p>{{ $data['description'] }}</p>
                                    <p><a href="{{$data['url']}}" class="btn btn-primary" role="button" download>Download</a></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No data</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
