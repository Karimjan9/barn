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
a.disabled {
    pointer-events: none;
    color: #ccc;
}
    </style>

@endsection
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
            <h6 class="mb-0 text-uppercase">Barcha jihozlar</h6>
        </div>
       
        <hr>

        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Xodim ismi </th>
                                  
                                    <th class="fixed_header2 align-middle" >Jihoz Turi</th>

                                    <th class="fixed_header2 align-middle">Jihoz </th>

                                    <th class="fixed_header2 align-middle">Soni </th>

                                    <th class="fixed_header2 align-middle">Tavsif </th>

                                    <th class="fixed_header2 align-middle">Rektor fikri </th>

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
                                <td > {{ $ask->rektor_comment ?? 'No comment' }} </td>
                                <td>
                                    @if ($ask->must_type==0 && $ask->manager_status==0 )
                                        
                                        <a class="btn btn-danger" href="{{ route('bugalter_role.order.to_manager',['ask_id'=>$ask->id]) }}"  >
                                            Buyrug' berish</a>
                                   
                                    @elseif ( $ask->ordered==1)
                                        <a  class="btn btn-warning" href="{{ route('bugalter_role.accountant.show',['accountant'=>$ask->id]) }}">Jihoz berish</a>
                                    @elseif ( $ask->ordered==2)
                                        <button class="btn btn-success" onclick="{{ route('bugalter_role.accountant.show',['accountant'=>$ask->id]) }}" type="button" disabled>
                                          Gived</button>
                                    @elseif ($ask->must_type==2 )
                                         <a  class="btn btn-primary" href="{{ route('bugalter_role.accountant.show',['accountant'=>$ask->id]) }}">Jihoz berish</a> 
                                    @elseif ($ask->manager_status==1 )
                                        <button class="btn btn-secondary" onclick="{{ route('bugalter_role.accountant.show',['accountant'=>$ask->id]) }}" type="button" disabled>
                                         Menegerga buyrug' berish </button>
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
$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("100");
  $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

</script>
<script>
 
</script>
@endsection