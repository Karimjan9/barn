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
.inline { 
display: inline-block; 
margin:3px;
}
    </style>

@endsection
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Arizalar qismi</div>
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
            <h6 class="mb-0 text-uppercase">Arizalar</h6>
        </div>
       
        <hr>

        <select name="filter_application" id="fil_app" class="form-select form-select-lg mb-3">
        
            @foreach ($filters as $key=>$filter)
                                
              <option value="{{ $key}}" >{{ $filter }} </option>
    
            @endforeach
         

      
      </select>
        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Xodim nomi </th>
                                  
                                    <th class="fixed_header2 align-middle" >Jihoz turi</th>

                                    <th class="fixed_header2 align-middle">Jihoz </th>

                                    <th class="fixed_header2 align-middle">Soni </th>

                                    <th class="fixed_header2 align-middle">Tasnif </th>

                                    <th class="fixed_header2 align-middle">Buyrug' </th>

                                    <th class="fixed_header2 align-middle">Harakatlar </th>


                                </tr>
                            </thead>
                            <tbody id="table_app">
                            
                                @foreach ($asks as $key=>$ask)
                                <tr>
                            
                                <td>{{ $key+1 }}</td>
                                <td>{{ $ask->get_user->full_name }}</td>
                                <td >{{ $ask->get_first_type->name_of_type}}</td>
                                <td>{{ $ask->get_second_type->name }}</td>
                                <td >{{ $ask->number}}</td>
                              
                                <td >{{ $ask->description}}</td>
                                <td >@if ($ask->rektor_comment==null)
                                        @if ($ask->status==0)
                                           <textarea rows="5" id="order_rec"  name="order" cols="40" placeholder="Order ...."></textarea>
                                                    
                                        @else
                                            No commet
                                        @endif
                                    
                                      @else
                                        
                                          {{ $ask->rektor_comment }}
                                      @endif
                                </td>

                           

                                  <td>
                                    @if ($ask->status==0)
                                        <div class="inline"> 
                                            <form action="{{ route('rektor_role.accept.application',['app_id'=>$ask->id])}}" method="GET" onclick="give_order()">
                                                   
                                                    <input type="hidden" name="order_from_rector">
                                                    <input class="btn btn-sm btn-success text-white me-2"  type="submit" value="Qabul qilish"  >
                                                </form>
                                            </div>
                                                
                                        <div class="inline">
                                        <form action="{{ route('rektor_role.deny.application',['app_id'=>$ask->id]) }}" method="GET" onclick="give_order()">
                                           
                                          <input type="hidden" name="order_from_rector">
                                            <input class="btn btn-sm btn-danger text-white me-2"  type="submit" value="Rad etish" >
                                        </form>
                                        </div>
                                    @elseif ($ask->status==1)
                                        <div class="inline">
                                            <button type="button" class="btn btn-sm btn-success text-white me-2" disabled>Ruxsat berilgan</button>
    
                                        </div>
                                    @else
                                        <div class="inline">
                                            <button type="button" class="btn btn-sm btn-danger text-white me-2" disabled>Rad etilgan</button>
                                        </div>
                                    @endif
                             
                                 
                                  </td>
                                
                                </tr>
                            @endforeach
                                

    
                            </tbody>
                        </table>
                      
                        <div class="card-body">

                            {{ $asks->links() }}
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
  function give_order(params) {
  
    $('input[name="order_from_rector"]').val($('#order_rec').val());

  }
 
</script>
<script>
$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("100");
  $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

</script>
<script>
      function fil_app() {
        
        $.ajax('{{ route('rektor_role.ajax_get_filter_app') }}', {
            type : "GET",
            data : {
                'fil_value' : $('#fil_app').val(),
              
            },
            success : function (data, status){
                // console.log(data.responses);
    
                $('#table_app').html('')
    
                let html_row = '';
               
                let count=1;
                for (const iterator of data.responses) {
                  html_row+=`<tr>`;
                  let url = "{{ route('rektor_role.accept.application',':id') }}";
                  // let url_1= "{{ route('rektor_role.deny.application',':id') }}";

                  url = url.replace(':id', iterator.id);
                  // url_2=url_1.replace(':id', iterator.id);
                
                    
                    html_row += `
                    <td>${count }</td>  ` +
                    `<td>${iterator.get_user.full_name}</td>`+
                    `<td>${iterator.get_first_type.name_of_type}</td>`+
                    `<td>${iterator.get_second_type.name}</td>`+
                    `<td>${iterator.name}</td>`+
                    `<td>${iterator.description}</td>`;

                    if (iterator.status==0) {
                      html_row+=` <td >
                        <textarea rows="5" id="order_rec"  name="order" cols="40" placeholder="Order ...."></textarea>
                      </td>
                      <td><div class="inline">
                              <form action= ${url} method="GET" onclick="give_order()">
                                <input type="hidden" name="order_from_rector" >
                                <input class="btn btn-sm btn-success text-white me-2"  type="submit" value="Qabul qilish"  >
                                  </form>
                              </div>
                                  
                          <div class="inline">
                          <form action=${url_2} method="GET" onclick="give_order()">
                          
                            <input type="hidden" name="order_from_rector">
                              <input class="btn btn-sm btn-danger text-white me-2"  type="submit" value="Rad etish" >
                          </form>
                          </div></td>`


                    }if (iterator.status==1) {
                      html_row+=` <td><div class="inline">
                                            <button type="button" class="btn btn-sm btn-success text-white me-2" disabled>Ruxsat berilgan</button>
    
                                        </div></td>`;
                    }if (iterator.status==2) {
                      html_row+=`<td> <div class="inline">
                                            <button type="button" class="btn btn-sm btn-danger text-white me-2" disabled>Rad etilgan</button>
                                        </div></td>`;
                    }
                    count=count+1;
                    html_row+=`</tr>`
                }
               
                $('#table_app').html(html_row)
            }
        })
    }
    
    $('#fil_app').change( function () {
        fil_app();
    });
</script>
@endsection