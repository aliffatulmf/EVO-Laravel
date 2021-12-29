@extends('client.master.layouts')

@section('evo-title', 'Dashboard')

@section('evo-main')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach($candidates as $c)
                            <div class="col">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $c->image }}" class="img-fluid rounded-start" alt="caps">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h2>{{ $c->name }}</h2>
                                                <p class="card-text">
                                                    {!! Str::limit($c->description, 100) !!}
                                                </p>
                                                <a href="{{ route('client.show', $c->number) }}" style="width: 100%;" class="btn btn-success">See more.</a>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        <i>{{ $c->created_at }}</i>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection