@extends("layout.layout")
@section("title")
    {{$product["name"]}}
@endsection
@section("main")
    <div class="container">
        <h1> {{$product["name"]}}</h1>
        <form action="/add-to-cart/{{$product["id"]}}" method="post">
            @csrf
            <input value="1" type="number" name="bought_qty"/>
            <button type="submit" class="btn btn-primary">Add to cart</button>
        </form>
        <h2>Các sản phẩm cùng danh mục</h2>
        <div class="row">
            @foreach ($relateds as $item)
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
