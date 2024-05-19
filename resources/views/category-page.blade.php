@extends("layout.layout")
@section("title")
    {{$category["name"]}}
@endsection
@section("main")
    <div class="container">
        <h1> {{$category["name"]}}</h1>
        <div class="row">
            @foreach ($products as $item)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{$item["thumbnail"]}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item["name"] }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/product/{{$item["id"]}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section("end_main")
    <h2>End Main</h2>
@endsection
