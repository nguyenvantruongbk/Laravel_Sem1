<nav class="navbar navbar-expand-lg bg-body-tertiary">
@php
    $categories = App\Models\Category::all()->toArray();
@endphp
<div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        @foreach ($categories as $item)
        <li class="nav-item">
          <a class="nav-link" href="/category/{{$item["slug"]}}">{{$item["name"]}}</a>
        </li>
        @endforeach
        <li class="nav-item">
          <a class="nav-link" href="/cart">Cart({{session()->has("cart")?count(session("cart")):0}})</a>
        </li>
      </ul>
      <form action="/search" method="get" class="d-flex" role="search">
        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>