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
            <div class="breadcrumb-title pe-3">Bo'limlar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="starter-template">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif
            </div>
        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Barcha bo'limlar</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('kadr_role.department_update.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi bo'limlar qo`shish</a>
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
                                    <th class="fixed_header2 align-middle">Bo'lim name</th>
                                    <th class="fixed_header2 align-middle">Javobgar shaxs</th>
                                    <th class="fixed_header2 align-middle">Bino</th>

                                    
                                    <th class="fixed_header2 align-middle">Harakatlar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($departaments as $i => $items)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $items->name }}
                                        </td>
                                        <td>
                                            {{ $items->get_user->full_name??"NULL" }}
                                        </td>
                                        <td>
                                            {{ $items->get_building->name }}
                                        </td>
                                        
                                        {{-- <td>
                                         
                                            <nav class='animated bounceInDown'>
                                                <ul>
                                                  <li class='sub-menu'><a href='#settings'>{{ $items[0]->name }}<div class='fa fa-caret-down right'></div></a>
                                                    <ul>
                                               @foreach ($items[1] as $item)
                                                     
                                                     
                                               <li><a href='#settings'>{{ $item->name }}</a></li>
                                  
                                                      
                                               @endforeach
                                            </ul>
                                        </li>
                                       
                                    
                                      </ul>
                                    </nav>
                                    
                                  
                                        </td> --}}
                                                
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('kadr_role.department_update.edit',['department_update'=>$items->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>O'zgartirish</a>
                                            {{-- <form action="{{ route('kadr_role.department_update.destroy',['department_update'=>$items->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="O'chirish" onclick="return confirm('Are you sure to delete this ?');" >
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                              
                            
                            </tbody>
                        </table>
                      
                        {{-- <div class="card-body">

                            {{ $careers->links() }}
                        </div> --}}
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