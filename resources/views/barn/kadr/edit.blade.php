



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
                <h6 class="mb-0 text-uppercase">Foydalanuvchi qo`shish formasi22</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="{{ route('kadr_role.actions.update',['action'=>$user->id]) }}">
                            @method('PUT')
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Familiyasi</label>
                                <input type="text" value="{{ $user->surname }}" name="surname" class="form-control" id="full_name">
                            </div> --}}

                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Ismi</label>
                                <input type="text" name="name" value="{{ $user->full_name }}" class="form-control" id="full_name">
                            </div>
                            {{-- <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Otasining ismi</label>
                                <input type="text" name="other_name" value="{{ $user->other_name  }}" class="form-control" id="other_name">
                            </div> --}}
                            {{-- <div class="col-md-6 mb-3" >
                                <label for="full_name" class="form-label">Tug'ilgan sanasi</label>
                                <input type="date" name="date" class="form-control" id="full_name">
                            </div>
                            <div class="col-md-6 mb-3" >
                                <label for="full_name" class="form-label">Tug'ilgan joyi</label>
                                <input type="text" name="birth_place" class="form-control" id="full_name">
                            </div> --}}
                            {{-- <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Millati</label>
                                <input type="text" name="nation" class="form-control" id="full_name">
                            </div> --}}

                            {{-- <div class="col-md-10 mb-3" >
                                <label for="full_name" class="form-label">Jinsi:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Erkak">
                                    <label class="form-check-label"  for="inlineRadio1">Erkak</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Ayol">
                                    <label class="form-check-label"  for="inlineRadio2">Ayol</label>
                                  </div>
                            </div> --}}
                            {{-- <div class="col-md-12">
                             
                                <label for="message_body" class="form-label">Bo'lim tanlash</label>

                                <select name="departament" id="departament" class="form-select form-select-lg mb-3">
                                   
                                      @foreach ($departaments as $key=>$departament)
                                        
                                                  
                                                        <option value="{{ $departament->id }}" 
                                                        
                                                                @if ($departament->id==$user->user_job?->user_dep->id?? "null")
                                                                selected
                                                                @endif
                                                      
                                                              
                                                              
                                                            >{{ $departament->name }} </option>
                               
                                                    
                                      @endforeach
                        
                                
                                </select>
                            </div> --}}

                            {{-- <div class="col-md-12">
                             
                                <label for="message_body" class="form-label">Mansab tanlash</label>

                                <select name="career" id="career" class="form-select form-select-lg mb-3">
                                    careers
                                    @foreach ($careers as $key=>$career)
                                        
                                                  
                                    <option value="{{ $career->id }}" 
                                       
                                            @if ($career->id==$user->user_job?->user_career?->id)
                                            selected
                                            @endif
                                          
                                        >{{ $career->name }} </option>
           
                                
                  @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Tel raqami:</label>
                                <input type="number" value="{{ $user->number_phone }}" name="phone_number"  class="form-control" id="jshir">
                            </div> --}}
                            {{-- <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">JShIR</label>
                                <input type="number" name="jshir"  class="form-control" id="jshir">
                            </div> --}}

                          
                          

                       
                            <div class="col-md-12 mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" value="{{ $user->login }}" class="form-control" id="login">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="password" class="form-label">Parol</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="password_confirmation" class="form-label">Parolni qayta kiriting</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>

                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-primary px-5">Saqlash</button>
                            </div>
                            
                        </form>
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
<script>
    function get_second_type() {
    
    $.ajax('{{ route('kadr_role.get_register.filter_departament') }}', {
        type : "GET",
        data : {
           
            'dep_id' : $('#departament').val(),
  
            
        },
        success : function (data, status){
            console.log(data.responses);
  
            $('#career').html('')
  
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
           
            $('#career').html(html_row)
        }
    })
  }
  
  $('#departament').change( function () {
    get_second_type();
  });
  </script>
@endsection



