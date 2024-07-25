



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
    {{-- @dd(1) --}}
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> Cargo o'zgartirish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cargo o'zgartirish</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Cargo o'zgartirish</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <form class="row g-3" method="post" action="{{ route('storekeeper_role.cargo.update',['cargo'=>$cargo->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Cargo ismi</label>
                                <input type="text" name="name" value="{{ $cargo->name }}" class="form-control" id="full_name">
                            </div>
                           
                           
                         
                      
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Cargo sanasi</label>
                              
                                   
                                    <input type="date" value="{{ $cargo->come_date!=null ? $cargo->come_date->format('Y-m-d'):"2024-04-04" }}" name="come_date" class="form-control" id="date">
                               
                            </div>
                            <div class="col-md-8">
                                <label for="message_body" class="form-label">Shartnoma</label>
                                <input class="form-control" name='file_contract' type="file" id="formFile" >
                            </div>

                            
                            <div class="col-md-8">
                                <label for="message_body" class="form-label">Shot faktura</label>
                                <input class="form-control" name='file_faktura' type="file" id="formFile" >
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Cargo tasnifi</label>
                                <textarea class="form-control"  id="description" name="description" rows="8">{{ $cargo->description }}</textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-primary px-5">O'zgartirish</button>
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
    function filter_types() {
        
        $.ajax('{{ route('storekeeper.ajax.get_second_types') }}', {
            type : "GET",
            data : {
                'first_type' : $('#first_type').val(),
               
            },
            success : function (data, status){
                // console.log(data);

                $('#list_data').html('')

                let html_row = '';

                for (const iterator of data.responses) {
                  
                 
                    
                    html_row += `
                    <option value="${iterator.id}" 
                                        >${iterator.name}</option>
                    `
                }

                $('#second_type').html(html_row)
            }
        })
    }

    $('#first_type').change( function () {
        filter_types();
    });
</script> --}}

@endsection



