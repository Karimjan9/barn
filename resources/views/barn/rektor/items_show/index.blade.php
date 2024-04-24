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
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Hamma jihozlar</h6>
        </div>
        
        <div class="d-flex align-items-center">
        
        </div>
        

        <hr>
        <div class="col-md-8 mb-3">
          <label for="first_type" class="form-label">Jihoz turi</label>
        <select name="first_filter" id="first_filter" class="form-select form-select-lg mb-3">
        
          @foreach ($firsts as $key=>$first)
                              
            <option value="{{ $first->id}}" >{{ $first->name_of_type }} </option>
  
          @endforeach
       

          
        </select>
        </div>
      <div class="col-md-8 mb-3">
      <label for="first_type" class="form-label">Jihoz nomi</label>
      <select name="second_filter" id="second_filter" class="form-select form-select-lg mb-3">
          

    


      </select>
      </div>
      <div class="col-md-8 mb-3">
        <label for="first_type" class="form-label">Moddiylik turi</label>
      <select name="bodily" id="bodily" class="form-select form-select-lg mb-3">
          
        @foreach ($bodilys as $key=>$bodily)
                            
          <option value="{{ $bodily->id}}" >{{ $bodily->name }} </option>

        @endforeach
    


      </select>
      </div>
    
        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Modeli</th>
                                    <th class="fixed_header2 align-middle">Jihoz turi</th>
                                    <th class="fixed_header2 align-middle">Jihoz nomi</th>
                                    <th class="fixed_header2 align-middle">Barcha soni</th>
                                    <th class="fixed_header2 align-middle">Berilganlar soni</th>
                                    <th class="fixed_header2 align-middle">Qoldig'i</th>



                                </tr>
                            </thead>
                            <tbody id="filter_ajax">
                            
                                @foreach ($all_items as $key=>$all_item)
                                <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $all_item->name }}</td>
                                <td>{{ $all_item->get_first->name_of_type}}</td>
                                <td>{{ $all_item->get_second->name}}</td>
                                <td>{{ $all_item->extant}}</td>
                                <td>{{ $all_item->absent}}</td>
                                <td>{{ $all_item->extant -  $all_item->absent}}</td>




                              
                                 
                                </tr>
                            @endforeach
                      
                              
                             
                            </tbody>
                        </table>
                      
                        <div class="card-body">

                            {{ $all_items->links() }}
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
  function get_second_type() {
  
  $.ajax('{{ route('rektor_role.ajax_get_second_types') }}', {
      type : "GET",
      data : {
         
          'first_filter' : $('#first_filter').val(),

          
      },
      success : function (data, status){
          console.log(data.responses);

          $('#second_filter').html('')

          let html_row = '';
         
          let count=1;
          html_row += `
                    <option value=""></option>
                   
                    `
          for (const iterator of data.responses) {
         
  
              
              html_row += `
                    <option value="${iterator.id}">${iterator.name}</option>
                   
                    `

        
            
          }
         
          $('#second_filter').html(html_row)
      }
  })
}

$('#first_filter').change( function () {
  get_second_type();
});
</script>
<script>
        function get_without_bodily() {
        
        $.ajax('{{ route('rektor_role.ajax_get_without_bodily') }}', {
            type : "GET",
            data : {
                'second_filter' : $('#second_filter').val(),
                'first_filter' : $('#first_filter').val(),

                
            },
            success : function (data, status){
                console.log(data.responses);
    
                $('#filter_ajax').html('')
    
                let html_row = '';
               
                let count=1;
                for (const iterator of data.responses) {
                  html_row+=`<tr>`;
                   


                 
                    
                    html_row += `
                    <td>${count }</td>  ` +
                    `<td>${iterator.name}</td>`+
                    `<td>${iterator.get_first.name_of_type}</td>`+
                    `<td>${iterator.get_second.name}</td>`+
                    `<td>${iterator.extant}</td>`+
                    `<td>${iterator.absent}</td>`+
                    `<td>${iterator.extant - iterator.absent}</td>`;

              
                    html_row+=`</tr>`
                }
               
                $('#filter_ajax').html(html_row)
            }
        })
    }
    
    $('#second_filter').change( function () {
      get_without_bodily();
    });
</script>
<script>
  function get_with_bodily() {
  
  $.ajax('{{ route('rektor_role.ajax_get_with_bodily') }}', {
      type : "GET",
      data : {
          'second_filter' : $('#second_filter').val(),
          'first_filter' : $('#first_filter').val(),
          'bodily':$('#bodily').val(),
          
      },
      success : function (data, status){
          console.log(data.responses);

          $('#filter_ajax').html('')

          let html_row = '';
         
          let count=1;
          for (const iterator of data.responses) {
            html_row+=`<tr>`;
             


           
              
              html_row += `
              <td>${count }</td>  ` +
              `<td>${iterator.name}</td>`+
              `<td>${iterator.get_first.name_of_type}</td>`+
              `<td>${iterator.get_second.name}</td>`+
              `<td>${iterator.extant}</td>`+
              `<td>${iterator.absent}</td>`+
              `<td>${iterator.extant - iterator.absent}</td>`;

        
              html_row+=`</tr>`
          }
         
          $('#filter_ajax').html(html_row)
      }
  })
}

$('#bodily').change( function () {
  get_with_bodily();
});
</script>
@endsection