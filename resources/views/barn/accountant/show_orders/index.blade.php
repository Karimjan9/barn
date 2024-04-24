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
            <div class="breadcrumb-title pe-3">Yetishmayotgan jihozlar</div>
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
            <h6 class="mb-0 text-uppercase">Olinishi kerak jihozlar</h6>
        </div>
       
        <hr>

        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Xodim </th>
                                  
                                    <th class="fixed_header2 align-middle" >Jihoz Turi</th>

                                    <th class="fixed_header2 align-middle">Jihoz Nomi </th>

                                    <th class="fixed_header2 align-middle">Jihoz Soni </th>

                                    <th class="fixed_header2 align-middle">Mulohaza </th>

                        


                                </tr>
                            </thead>
                            <tbody id="table_app">
                            
                                @foreach ($commands as $key=>$command)
                                <tr>
                            
                                <td>{{ $key+1 }}</td>
                                <td>{{ $command->get_ask->get_user->full_name }}</td>
                                <td >{{ $command->get_ask->get_first_type->name_of_type}}</td>
                                <td>{{ $command->get_ask->get_second_type->name }}</td>
                                <td >{{ $command->get_ask->number}}</td>
                                <td >{{ $command->get_ask->description}}</td>

                              
                        
        
                                </tr>
                            @endforeach
                                

    
                            </tbody>
                        </table>
                      
                        <div class="card-body">

                            {{ $commands->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection
@section('scripte_include_end_body')


@endsection