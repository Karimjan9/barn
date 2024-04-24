        



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
textarea {
     width: 500px;
     height: 200px;
     border: 2px solid black;
     margin: 2px;
     padding: 0;
     overflow: hidden;
     resize: none;
     font-size: 24px;
  line-height: 28px;
     background-image: linear-gradient(transparent, transparent 27px, black 0px);
     background-size: 100% 28px;
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
            <div class="breadcrumb-title pe-3">Ariza qo'shish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi ariza</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Ariza qo'shish</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <form class="row g-3" method="post" action="{{ route('user_role.users_petitions.store')}}">
                            @csrf
                          
                            <div class="col-md-8 mb-3">
                            
                                <label for="first_type" class="form-label"> Jihoz Turi </label>
            
                                        <select name="type" id='type' class="form-select form-select-lg mb-3">
                                        <option value=""></option>
                                        @foreach ($firsts as $key=>$first)
                                
                                            
                                        <option value="{{ $first->id }}" 
                                            >{{ $first->name_of_type }} </option>
                
                                        @endforeach
    
                                        </select> 
                            </div>
                            <div class="col-md-8 mb-3">
                              
                                <label for="first_type" class="form-label">Jihoz nomi</label>
            
                                        <select name="second" id='second' class="form-select form-select-lg mb-3">
    
    
                                        </select> 
                            </div>
                           
                          
                           <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Soni</label>
                                <input type="number" name="number" class="form-control" id="count" >
                             </div>
                             <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Mulohaza</label>
                            <br />
                                <textarea rows="10" name="description" cols="50" placeholder="Describe yourself here..."></textarea>
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


<script>

function get_second() {
        
        $.ajax('{{ route('user_role.ajax_get_second_type_for_user') }}', {
            type : "GET",
            data : {
                'type' : $('#type').val(),
              
            },
            success : function (data, status){
                console.log(data.responses);
    
                $('#second').html('')
    
                let html_row = '';
                html_row += `
                    <option value=""></option>
                   
                    `
                for (const iterator of data.responses) {
                    var d = new Date(iterator.created_at);
                 
                    
                    html_row += `
                    <option value="${iterator.id}">${iterator.name}</option>
                   
                    `
                }
              
                $('#second').html(html_row)
            }
         
        })
    }
    
    $('#type').change( function () {
        get_second();
    });

   
</script>


        








@endsection



