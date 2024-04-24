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

nav ul li  a {
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
  border-left: 4px solid #2d4657;
}
.sub-menu_2{
    background-color: #eeea11;
}
    </style>

@endsection
@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Foydalanuvchi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Barcha foydalanuvchilar</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                {{-- <a href="{{ route('kadr_role.actions.create') }}" class="btn btn-info px-3"><i class="bx bx-plus"></i>Ichki o'rindosh</a> --}}
                <a href="{{ route('kadr_role.actions.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi foydalanuvchi qo`shish</a>
                
            </div>
        </div>


        <hr>


        <div class="card radius-10">
            <br>
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                        <div class="text-white">{{ $error }}</div>
                    </div>
                @endforeach
            </div>
                 <div class="card-body">
                    <div class="position-relative search-bar-box">
                        {{-- <form action="{{ route('kadr_role.search') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="number"  name="search" class="form-control rounded" placeholder="JShIR..." aria-label="Search" aria-describedby="search-addon" />
                                <input type="submit" class="btn btn-outline-primary" value="Qidiruv">
                              </div>
                        </form> --}}
                        {{-- <input type="number" class="form-control search-control" placeholder="Поиск ..."> <span class="position-absolute top-50 search-show translate-middle-y"><a href=""><i class='bx bx-search'></a></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'><a href=""></a></i></span> --}}
                    </div>
                    <br>
                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle " style="width: 10%" scope="col">#</th>
                                    <th class="fixed_header2 align-middle " style="width: 20%" scope="col">F.I.SH</th>
                                    <th class="fixed_header2 align-middle " style="width: 20%" scope="col">Lavozim </th>
                                    <th class="fixed_header2 align-middle " style="width: 20%" scope="col">Bo'lim</th>
                                    <th class="fixed_header2 align-middle " style="width: 20%" scope="col">O'zgartirish</th>
                                    {{-- <th class="fixed_header2 align-middle" scope="col">Login</th> --}}
                               
                                    {{-- <th class="fixed_header2 align-middle"  style="width: 10%" scope="col">Mansab va bo'lim o'zgartirish</th> --}}
                                    {{-- <th class="fixed_header2 align-middle" style="width: 25%" scope="col">Profil o'zgartirish</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                               
                                {{-- @dd($users) --}}
                                @foreach ($users as $i => $user)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $user->full_name }}
                                            {{-- <li class='sub-menu'><a style=" background: #73eeee;" href='#settings'> {{ $user->full_name }}<div class='fa fa-caret-down right'></div></a> --}}
                                           
                                        </td>
                                            
                                        {{-- <td>
                                         
                                            <nav class='animated bounceInDown'>
                                                <ul>
                                                    
                                                    @foreach ($user->user_get_all_job as $career_belong)
                                                  
                                                        @if ($career_belong->type_job==1 || $career_belong->type_job==3)
                                                           
                                                        <li class='sub-menu'><a style=" background: #73eeee;" href='#settings'>{{ $career_belong->get_career->career_name }}<div class='fa fa-caret-down right'></div></a>
                                                       
                                                        @endif
                                                     
                                                 
                                                  
                                                    @endforeach
                                                    @if ( count($user->user_get_all_job)==0)
                                                        <li class='sub-menu_2' ><a style=" background: rgb(255, 179, 179);" href='#settings'> Ishga olinmagan<div class='fa fa-caret-down right'></div></a>
                                                    @endif
                                                  
                                                    <ul>
                                              
                                                 
                                            </ul>
                                        </li>
                                       
                                    
                                      </ul>
                                    </nav>
                                    
                                  
                                        </td> --}}


                                        <td>
                                         
                                            <nav class='animated bounceInDown' style="width: 150px">
                                                <ul >
                                      
                                                        <li class='sub-menu' ><a  style=" background: #73eeee;" href='#settings'>{{ $user->user_job->user_career->name?? 'xodim!' }}<div class='fa fa-caret-down right'></div></a> </li>
                                            
                                                  
                                          
                                                 </ul>
                                       
                                       
                                    
                                    
                                    </nav>
                                    
                                  
                                        </td>

                                        <td>
                                         
                                            <nav class='animated bounceInDown' style="width: 150px">
                                                <ul>
                                      
                                                        <li class='sub-menu'><a style=" background: #73eeee;" href='#settings'>{{ $user->user_job->user_dep->name??"bo'lim!"  }}<div class='fa fa-caret-down right'></div></a>
                                            
                                                   
                                        </li>
                                       
                                    
                                      </ul>
                                    </nav>
                                    
                                  
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('kadr_role.get_job.index',['user_id'=>$user->id]) }}"  class="btn btn-sm btn-primary btn-lg text-white me-2 "
                                                ></i>Kadr ishga olish </a>
                                        </td> --}}
                                        {{-- <td>
                                            <div>
                                          
                                               
                                               <br>
                                               <a href="{{ route('kadr_role.user.data_give',['user'=>$user->id]) }}"  class="btn btn-sm btn-success btn-lg text-white me-2 "
                                                ></i>Ma'lumot kiritish </a>
                                               <br>
                                                    @if ($user->user_second!=null)
                                                    {{ $user->user_second->percent }}%
                                                    <div class="progress">
                                                        <div
                                                        @if ($user->user_second->percent==40)
                                                            class="progress-bar progress-bar-striped bg-warning" 
                                                        @elseif ($user->user_second->percent==60) 
                                                            class="progress-bar progress-bar-striped bg-info" 
                                                        @elseif ($user->user_second->percent==80) 
                                                            class="progress-bar progress-bar-striped " 
                                                        @elseif ($user->user_second->percent==100)    
                                                            class="progress-bar progress-bar-striped bg-success" 
                                                        @endif
                                                        role="progressbar" style="width: {{  $user->user_second->percent  }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                      </div>
                                                   
                                                    @else
                                                    0%
                                                        <div class="progress">
                                                            
                                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                       
                                                        </div>
                                                    
                                                    @endif
                                              </div>
                                        </td> --}}
                                      
                                        {{-- <td class=" align-items-center">
                                            
                                          <div>
                                          
                                            <a href="{{ route('kadr_role.change.career',['user'=>$user->id]) }}" class="btn btn-sm btn-primary btn-lg text-white me-2"></i>Mansab </a>
                                           
                                            

                                          </div>
                                          
                                        </td> --}}
                                        {{-- </td> --}}
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('kadr_role.actions.edit',['action'=>$user->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>Profil sozlash</a>
                                            {{-- <form action="" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="Delete">
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- @if ($search==0) --}}
                        <div class="card-body">

                            {{ $users->links() }}
                        </div>
                        {{-- @endif --}}
                       
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