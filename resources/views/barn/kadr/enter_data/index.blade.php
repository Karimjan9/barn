



@extends('template')

@section('style')

    <style>
        .ck-restricted-editing_mode_standard{
            min-height: 500px;
        }
        input[type=radio] {
    width: 30px;
    height: 30px;
    margin: 10px 0 0 0;
}
.form-check-label{
    margin: 10px 0 0 5px;
    font-size: 20px;
}
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
    </style>

@endsection

@section('script_include_header')

    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>

@endsection

@section('body')

<div class="page-wrapper">
    
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Foydalanuvchi qo`shish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi foydalanuvchi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Foydalanuvchi qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        {{-- @dd($second->user_img) --}}
                    
                    

                            <div class="container">
                                <div class="main-body">
                                
                                    <!-- Breadcrumb -->
                                  
                                
                                    <!-- /Breadcrumb -->
                                {{-- @dd($user_image) --}}
                                    <div class="row gutters-sm">
                                        <div class="col-md-12 mb-3">
                                            <div style="display: inline-block; ">
                                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="{{ route('kadr_role.actions.index') }}">Home</a></li>/
                          
                                                    </ol>
                                                </nav>
                                            </div>
                                           
                                         
                                        </div>
                                        <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                               <br>
                                                <img src="{{ url('storage/files/image/'."$user_image") }}" alt="Admin" class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                    <br>
                                                    <br>
                                                <h4>{{ $user->full_name }}</h4>
                                                {{-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                                <button class="btn btn-primary">Follow</button>
                                                <button class="btn btn-outline-primary">Message</button> --}}
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                     
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                               {{$user->full_name}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                               {{ $user->email ?? "JohnDoe@gmil.com" }}
                                                </div>
                                            </div>
                                            <hr>
                                      
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                <h6 class="mb-0">Mobile</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                {{ $user->number_phone ?? "+998991234567" }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                <h6 class="mb-0">Birth_Place</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                               {{$user->birth_place ?? "Buxoro"}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                <h6 class="mb-0">Birth_date</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                               {{$user->birth_date ? Carbon\Carbon::parse($user->birth_date)->format('d-m-Y'):"2023-12-12"}}
                                                </div>
                                            </div>
                                            <hr>
                                    
                                                <div style="display: inline-block; ">
                                                   
                                                    @if ($user->user_get_counter!=null)
                                                        @if ($user->user_get_counter->status==1)
                                                            <a href="{{ route('kadr_role.get_job.index',['user_id'=>$id]) }}"  style="width: 90px;height:50px" class="btn btn-sm btn-primary btn-lg text-white me-2 disabled"
                                                                ></i>Kadr ishga olish </a>
                                                        @elseif ($user->user_get_counter->status==0)
                                                                <a href="{{ route('kadr_role.get_job.index',['user_id'=>$id]) }}"  style="width: 90px;height:50px" class="btn btn-sm btn-primary btn-lg text-white me-2 "
                                                                    ></i>Kadr ishga olish </a>
                                                        @endif
                                                    
                                                   @else
                                                        <a href="{{ route('kadr_role.get_job.index',['user_id'=>$id]) }}"  style="width: 90px;height:50px" class="btn btn-sm btn-primary btn-lg text-white me-2 "
                                                            ></i>Kadr ishga olish </a>
                                                    @endif
                                                 
                                                  
                                  <a href="{{ route('kadr_role.change.second_data',['user'=>$user->id]) }}"  style="width: 90px;height:50px" class="btn btn-sm btn-success btn-lg text-white me-2 "
                                                   ></i>Ma'lumot kiritish </a>
                                                       
                                                        <a href="{{ route('kadr_role.actions.edit',['action'=>$id]) }}" style="width: 90px;height:50px;padding:0 0 0 0;font-size:16px;" class="btn btn-sm btn-warning text-white me-2"></i>Profil sozlash</a>
                                                      
                                                        <div style="display: inline-block;">
                                                            <div >
                                                               
                                                               
                                                                <form action="" method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <input style="width: 90px;height:50px" class="btn btn-sm btn-danger confirm-button  btn-lg" type="submit" value="Bo'shatish">
                                                                </form>
                                                             </div>
                                                        </div>
                                                      
                                
                                                 </div>
                                                 
                                               
                                            
                                            </div>
                                        </div>
                            
                                            </div>
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Lavozim</th>
                                                        <th scope="col">Ish turi</th>
                                                        <th scope="col">Stavka</th>
                                                        <th scope="col">Bo'lim</th>
                                                        <th scope="col">O'zgartirish</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_jobs as $key=>$get_job)
                                                        <tr>
                                                            <th scope="row">{{ $key+1 }}</th>
                                                            <td>{{ $get_job->get_career->career_name }}</td>
                                                            <td>{{ $get_job->get_rate->rate }}</td>
                                                            <td>{{ $get_job->get_type->name }}</td>
                                                            <td>{{ $get_job->get_departament->name }}</td>
                                                            <td>
                                                                <a href="{{ route('kadr_role.change.career',['user'=>$id,'get_job'=>$get_job->id]) }}" style="width: 90px;height:30px;padding:2px 0 0 0;font-size:17px;" class="btn btn-sm btn-primary btn-lg text-white me-2"></i>Mansab </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                   
                                                     
                                                     
                                                </tbody>
                                              </table>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                            
                            
                            
                                        </div>
                                    </div>
                            
                                    </div>
                                </div>
                             
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>


@endsection

@section('scripte_include_end_body')

{{-- <script>
    $("#level_id").change(function(){
        if ($(this).val() == 1) {
            $('#block').html(``)
        }else{
            $('#block').html(`
            <div class="col-md-12">
                <label for="departament_id" class="form-label">Kafedra</label>
                <select class="form-select mb-3" name="departament_id" aria-label="Default select example">
                    @foreach ($departaments as $item)
                        <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                    @endforeach
                </select>
            </div>
            
            `)
        }
        console.log()
    })
    </script> --}}

{{-- 
    
    $(this).val() == 3 
    <div class="col-md-12">
    <label for="role" class="form-label">Role</label>
    <input type="text" name="role" class="form-control" id="role">
    </div> 
--}}

@endsection



