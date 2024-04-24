



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
                        <form class="row g-3" method="post" action="{{ route('kadr_role.get_job.store',['user_id'=>$user_id]) }}"enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="user" name="user" value="{{ $user->id }}">
                         
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Departaments</label>
                                <div class="col-md-12">

                               

                                <select name="departament_id" id="departament_id" class="form-select form-select-lg mb-3">
                                    
                                        
                                    @foreach ($departaments as $key=>$departament)
                                    
                                            <option value="{{ $departament->id }}">{{ $departament->name }}</option>

                                    @endforeach
                    
                                
                                </select>
                                   </div>
                            </div>
                            <div class="col-8 mb-3">
                                <div class="col-md-12">
                                       <label for="message_body" class="form-label">Career</label>
       
                                       <select name="degree" id='post' class="form-select form-select-lg mb-3">

                                        <option value="0">Yo'q</option>

                                       </select> 
                                   </div>
                            </div>
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Type of Jobs</label>
                                <div class="col-md-12">

                               

                                <select name="type_id" id="type_id" class="form-select form-select-lg mb-3">
                                    <option value="0"></option>
                                    @if (count($get_jobs)>0)
                                        @foreach ($type_of_jobs as $type_of_job)
                                            @if ($main>0 && ($type_of_job->id==2))
                                                <option value="{{ $type_of_job->id }}">{{ $type_of_job->name }}</option>
                                            @endif
                                            @if ($out>0 && $type_of_job->id==3)
                                                <option value="{{ $type_of_job->id }}">{{ $type_of_job->name }}</option>
                                            @endif
                                        @endforeach 
                                     
                                          
                                                
                                    @else
                                        @foreach ($type_of_jobs as $key=>$type_of_job)
                                                    @if ($type_of_job->id==2)
                                                        
                                                    @else
                                                    <option value="{{ $type_of_job->id }}">{{ $type_of_job->name }}</option>
                                                    @endif
                                           
                                        @endforeach
                                    @endif
                                          
                               
                    
                                
                                </select>
                                   </div>
                            </div>
                   <div class="col-md-8 mb-3">
                        {{-- <input type="number"     id="" value="0.0"> --}}
                        <label for="rate_job" class="form-label">Rate</label>
       
                                       <select name="rate_id" id='rate_id' class="form-select form-select-lg mb-3">

                                     

                                       </select> 
                   </div>
                            <div class="col-12">
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

<script>

function filter_departament() {
        
        $.ajax('{{ route('kadr_role.get_job.filter_departament') }}', {
            type : "GET",
            data : {
                'departament_id' : $('#departament_id').val(),
              
            },
            success : function (data, status){
                console.log(data.departaments);
    
                $('#post').html('')
    
                let html_row = '';
    
                for (const iterator of data.departaments) {
                    var d = new Date(iterator.created_at);
                 
                    
                    html_row += `
                    <option value="${iterator.id}">${iterator.career_name}</option>
                   
                    `
                }
    
                $('#post').html(html_row)
            }
        })
    }
    
    $('#departament_id').change( function () {
        filter_departament();
    });

    function filter_rate() {
        
        $.ajax('{{ route('kadr_role.get_job_rate.filter_rate') }}', {
            type : "GET",
            data : {
                'type_id' : $('#type_id').val(),
                'user':$('#user').val(),
                'career':$('#post').val(),
              
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
    
    $('#type_id').change( function () {
        filter_rate();
    });
</script>

{{-- 
function list(items) {

    let html = '<option></option>';
    for (const item of items) {
    
        html += `<option value="${ item.id }" data-json='${ JSON.stringify(item) }'>${ item.name }</option>`
    }

    $('#test').append(`<select onclick="set_child(this)">${html}</select>`)
} --}}

@endsection



