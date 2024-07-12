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
            <div class="breadcrumb-title pe-3">Jihozlar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('user_role.users_invertar.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('user_role.show_invertar_deps') }}" class="btn btn-primary px-3"></i>Orqaga</a>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Qabul qilingan jihozlar </h6>
        </div>
        
        {{-- <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('storekeeper_role.cargo.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi Cargo</a>
            </div>
        </div> --}}


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                   
                                    <th class="fixed_header2 align-middle">Jihoz nomi </th>
                                   
                                    <th class="fixed_header2 align-middle">Jihoz soni </th>
                                    
                                 
                                    <th class="fixed_header2 align-middle">Jihoz qabul qilish</th>

                                    {{-- <th class="fixed_header2 align-middle">O'chirish</th> --}}


                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($items as $key=>$item)
                                <tr>
                            
                                <td>{{ $key+1 }}</td>

                                <td>{{ $item->get_item->name }}</td>

                                <td>{{ $item->give_item}}</td>


                                <td> 
                                    {{-- <a href="" class="btn btn-sm btn-success text-white me-2" aria-disabled="true" role="button" data-bs-toggle="button"></i>Qabul qilingan</a> --}}
                                    <button type="button" class="btn btn-success btn-lg" disabled>Qabul qilingan</button>
                                    {{-- <form action="{{ route('user_role.invertar_store',['dep_id'=>$id,'item_id'=>$item->get_item->id]) }}" method="post" id="form-1">
                                        @csrf --}}
                                        {{-- <input class="btn btn-sm btn-success confirm-button"  type="submit" value="Qabul qilish"  > --}}
                                        {{-- <button class="btn btn-success" disabled>Qabul qilingan</button>
                                    </form> --}}
                                </td>
                                 
                                </tr>
                            @endforeach
                                

    
                            </tbody>
                        </table>
                      
                        <div class="card-body">

                            {{ $items->links() }}
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