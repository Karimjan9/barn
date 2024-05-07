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
            <div class="breadcrumb-title pe-3">Cargo</div>
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
            <h6 class="mb-0 text-uppercase">Cargo qismi</h6>
        </div>
        
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('storekeeper_role.cargo.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi Cargo</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                   
                                    <th class="fixed_header2 align-middle">Cargo ismi</th>
                                   
                                    <th class="fixed_header2 align-middle">Cargo sanasi</th>
                                    
                                    <th class="fixed_header2 align-middle">Jo'natuvchi</th>
                                   
                                    <th class="fixed_header2 align-middle" >Mulohaza</th>

                                    <th class="fixed_header2 align-middle">O'zgartirish</th>

                                    <th class="fixed_header2 align-middle">Kiritish , chiqarish</th>

                                    {{-- <th class="fixed_header2 align-middle">O'chirish</th> --}}


                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($cargos as $key=>$cargo)
                                <tr>
                            
                                <td>{{ $key+1 }}</td>

                                <td>{{ $cargo->name }}</td>

                                <td>{{ $cargo->come_date!=null ? $cargo->come_date->format('d-m-Y') :"date" }}</td>

                                <td>{{ $cargo->sender_id ?? "Berilmagan" }}</td>

                                <td >{{ $cargo->description}}</td>

                             
                                  <td> <a href="{{ route('storekeeper_role.cargo.edit',['cargo'=>$cargo->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>Cargo o'zgartirish</a></td>
                                 
                                    {{-- <td class="d-flex align-items-center">
                                           
                                            <form action="" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="Bo'shatish">
                                            </form>
                                        </td> --}}
                                        <td>
                                          <div class="form-check form-switch">
                                            <input class="form-check-input"  onchange   = "switch_cargo({{ $cargo->id }});" style="width:75%;height:25px;margin:0px 0px 0px 0px ;" value="{{ $cargo->id }}" type="checkbox" id={{ "flexSwitchCheckChecked"."$key" }} @if ($cargo->active_status==1)
                                            checked  
                                            @endif >
                                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                          </div>
                                        </td>
                                 
                                  {{-- <td>
                                    <form action="{{ route('storekeeper_role.cargo.destroy',['cargo'=>$cargo->id]) }}" method="post">
                                      @csrf
                                      @method("DELETE")
                                      <input class="btn btn-sm btn-danger confirm-button"  type="submit" value="Delete cargo" onclick="return confirm('Are you sure to delete this ?');" >
                                  </form>
                                  </td> --}}
                                </tr>
                            @endforeach
                                

    
                            </tbody>
                        </table>
                      
                        <div class="card-body">

                            {{ $cargos->links() }}
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
<script>
 
  function switch_cargo(id) {
   
  $.ajax('{{ route('storekeeper_role.cargo_switch') }}', {
      type : "GET",
      data : {
      
          'id' : id,

          
      },
      success : function (data, status){
          // console.log(data.responses);

          // $('#second_filter').html('')

          // let html_row = '';
         
          // let count=1;
          // html_row += `
          //           <option value=""></option>
                   
          //           `
          // for (const iterator of data.responses) {
         
  
              
          //     html_row += `
          //           <option value="${iterator.id}">${iterator.name}</option>
                   
          //           `

        
            
          // }
         
          // $('#second_filter').html(html_row)
      }
  })
}

// $(('.form-check-input')).change( function () {
//   switch_cargo();
// });
</script>
@endsection