@extends('layouts.app', [
    'namePage' => 'Maps',
    'class' => 'sidebar-mini',
    'activePage' => 'maps',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div style = "padding:20px">
            <h1><strong>PRODUCTS</strong></h1>
            <p><EM>DESCRIPTIONS OF PRODUCTS</EM></p>
            
          </div>
          @for($i = 0; $i < count($product); $i = $i + 4)
          <div style = "padding:20px">
          <!-- home controller -->
            <h1><strong>{{$product[$i + 1]}}</strong></h1>
            <p><em>{{$product[$i+2]}}</em></p>
            <p>Quantity : {{$product[$i + 3]}}</p>

            <form method="get" action="{{route('productBook')}}">
                @csrf
                <div>
                    <input id="quantity" type="text" class="form-control" placeholder="Enter in the quantity you want to book" name="quantity" required>
                </div>
                <div>
                    <input id="participantID" type="hidden"  name="participantID" value="{{$product[$i]}}">
                </div><br>
                <button type="submit" class="btn btn-primary">
                    BOOK
                </button>
            </form>
          </div>
          @endfor
        </div>
      </div>
    </div>
  </div>
@endsection

