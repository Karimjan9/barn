@extends('template')
@section('style')

    <style>
body {
  background-color: #fff;
  font-size: 14px;
}
nav {
  position: relative;
  margin: 25px;
  width: 360px;
}
nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
nav ul li {
  /* Sub Menu */
}

nav ul li a {
  display: block;
  background: #73eeee;
  padding: 10px 15px;
  color: #333;
  text-decoration: none;
  -webkit-transition: 0.2s linear;
  -moz-transition: 0.2s linear;
  -ms-transition: 0.2s linear;
  -o-transition: 0.2s linear;
  transition: 0.2s linear;
}
nav ul li a:hover {
  background: #f8f8f8;
  color: #515151;
}

nav ul li a .fa {
  width: 16px;
  text-align: center;
  margin-right: 5px;
  float:right;
}
nav ul ul {
  background-color:#ebebeb;
}
nav ul li ul li a {
  background: #f8f8f8;
  border-left: 4px solid transparent;
  padding: 10px 20px;
}
nav ul li ul li a:hover {
  background: #ebebeb;
  border-left: 4px solid #3498db;
}
.sub-menu_2{
    background: #eeea11;
}
    </style>

@endsection
@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Birlik nomi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Birlik nomi</h6>
        </div>
       
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('rektor_role.rektor_currency.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi Valyuta</a>
            </div>
        </div>
        <div class="starter-template">
            @if(session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
            {{-- @yield('content') --}}
        </div>

        <hr>


        <div class="card radius-10">
         
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Valyuta   nomi</th>
                                 
                                    <th class="fixed_header2 align-middle">Valyuta birligi</th>
                                    <th class="fixed_header2 align-middle">O'zgartirish</th>

                                    {{-- <th class="fixed_header2 align-middle">O'chirish</th> --}}


                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($currencys as $key=>$currency)
                                <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->value }} so'm</td>

                                {{-- <td>{{ $second_type->get_first_type->name_of_type }}</td> --}}

                                {{-- <td class="d-flex align-items-center">
                                           
                                            <form action="" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="Bo'shatish">
                                            </form>
                                        </td> --}}
                                  <td> <a href="{{ route('rektor_role.rektor_currency.edit',['rektor_currency'=>$currency->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>Valyuta O'zgartirish</a></td>
                                  {{-- <td>
                                    <form action="{{ route('storekeeper_role.second_type_item.destroy',['second_type_item'=>$second_type->id]) }}" method="post">
                                      @csrf
                                      @method("DELETE")
                                      <input class="btn btn-sm btn-danger confirm-button"  type="submit" value="O'chirish" onclick="return confirm('Are you sure to delete this ?');" >
                                  </form>
                                  </td> --}}
                                </tr>
                            @endforeach
                      
                              
                             
                            </tbody>
                        </table>
                      
                        <div class="card-body">

                            {{ $currencys->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection
@section('scripte_include_end_body')

<script>
$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("100");
  $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

</script>
@endsection