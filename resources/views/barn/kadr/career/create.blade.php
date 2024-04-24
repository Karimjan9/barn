






@extends('template')

@section('style')

    <style>
        .ck-restricted-editing_mode_standard{
            min-height: 500px;
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
                        <form class="row g-3" method="post" action="{{ route('kadr_role.change.career.store',['user'=>$users->id]) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Departaments</label>
                                <div class="col-md-12">

                               

                                <select name="departament_id" id="departament_id" class="form-select form-select-lg mb-3">
                                    
                                        
                                    @foreach ($departaments as $key=>$departament)
                                    
                                            <option value="{{ $departament->id }}" 
                                                @if ($get_job->dep_id==$departament->id)
                                                   @selected(true) 
                                                @endif
                                                >{{ $departament->name }}</option>

                                    @endforeach
                    
                                
                                </select>
                                   </div>
                            </div>
                            <div class="col-md-8">
                             
                                <label for="message_body" class="form-label">Mansab tanlash</label>

                                <select name="career" id="career" class="form-select form-select-lg mb-3">
                                  
                                      @foreach ($careers as $key=>$career)
                                        
                                                  
                                                        <option value="{{ $career->id }}" 
                                                            @if ($career->id==$get_job->career_id)
                                                                @selected(true)
                                                            @endif>{{ $career->career_name }} </option>
                               
                                      @endforeach
                             
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                {{-- <input type="number"     id="" value="0.0"> --}}
                                <label for="rate_job" class="form-label">Rate</label>
               
                                               <select name="rate_id" id='rate_id' class="form-select form-select-lg mb-3">
        
                                                @foreach ($get_rates as $key=>$get_rate)
                                        
                                                  
                                                <option value="{{ $get_rate->id }}" 
                                                   >{{ $get_rate->rate }} </option>
                       
                                                @endforeach
        
                                               </select> 
                           </div>
                            <div class="col-md-8">
                                <label for="message_body" class="form-label">Buyruq rasmi</label>
                            <input class="form-control" name='file' type="file" id="formFile" >
                            </div>
                           
                  
            

                         
                            <div class="col-12 mb-3">
                                <br>
                                <button type="submit" class="btn btn-primary px-5">Saqlash</button>
                            </div>
                            <input type="hidden" name="get_type_job" id="get_type_job" value="{{ $get_type_job }}">
                            <input type="hidden" name="users" id='users' value="{{ $users->id }}">
                            <input type="hidden" name="get_job" id='get_job' value="{{ $get_job_id }}">
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
        function filter_departament() {
            $.ajax('{{ route('kadr_role.get_job.filter_departament') }}', {
                type : "GET",
                data : {
                    'departament_id' : $('#departament_id').val(),
                },
                success : function (data, status){
                    console.log(data.departaments);
                    $('#career').html('')
                    let html_row = '';
                    html_row += `
                        <option value="0">None</option>
                        `
                    for (const iterator of data.departaments) {
                        var d = new Date(iterator.created_at); 
                        html_row += `
                        <option value="${iterator.id}">${iterator.career_name}</option>
                        `
                    }
        
                    $('#career').html(html_row)
                }
            })
        }
        $('#departament_id').change( function () {
            filter_departament();
        });

        

        function filter_rate() {
        
        $.ajax('{{ route('kadr_role.get_job_rate.filter_rate.change_career') }}', {
            type : "GET",
            data : {
                'get_type_job':$('#get_type_job').val(),
                'career' : $('#career').val(),
                'users':$('#users').val(),
                'get_job':$('#get_job').val(),
                'departament_id' : $('#departament_id').val(),
              
            },
            success : function (data, status){
                console.log(data.rates);
    
                $('#rate_id').html('')
    
                let html_row = '';
    
                for (const iterator of data.rates) {
                    var d = new Date(iterator.created_at);
                 
                    
                    html_row += `
                    <option value="${iterator.id}">${iterator.rate}</option>
                    `
                }
                $('#rate_id').html(html_row)
            }
        })
    }
    
    $('#career').change( function () {
        filter_rate();
    });
    </script>
@endsection

