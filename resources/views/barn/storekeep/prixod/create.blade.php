        



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
            <div class="breadcrumb-title pe-3">Jihoz qo'shish formasi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi jo'natma</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Jo'natma</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <form class="row g-3" method="post" action="{{ route('storekeeper_role.prixod.store')}}">
                            @csrf
                          
                            <div class="col-md-8 mb-3">
                                <label for="first_type" class="form-label">Jihoz turi</label>
            
                                        <select name="type" id='type' class="form-select form-select-lg mb-3">
                                        <option value=""></option>
                                        @foreach ($types as $key=>$type)
                                
                                            
                                        <option value="{{ $type->id }}" 
                                            >{{ $type->name_of_type }} </option>
                
                                        @endforeach
    
                                        </select> 
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="first_type" class="form-label">Jihoz nomi</label>
            
                                        <select name="second" id='second' class="form-select form-select-lg mb-3">
    
    
                                        </select> 
                            </div>
                            <div class="col-md-8 mb-3">
                             
                                <label for="first_type" class="form-label">Jihoz </label>
            
                                        <select name="item" id='item' class="form-select form-select-lg mb-3">
    
    
                                        </select> 
                            </div>
                          
                           <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Soni</label>
                                <input type="number" name="number" class="form-control" id="count" oninput="myFunctionCalc()">
                             </div>
                             <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Narxi</label>
                                <input  type="number" min="1" step="any" name="cost" class="form-control" id="cost" oninput="myFunctionCalc()">
                             </div>
                             <br>
                             <h4> <span id="totalPrice">0 </span>so'm </h4>
                             <br>
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-primary px-5">Store</button>
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
    function myFunctionCalc() {
        var price = document.getElementById("cost").value;
        var count = document.getElementById("count").value;

        var total = price * count;
        document.getElementById("totalPrice").innerHTML = total;
         
    }
</script>
<script>

function get_second_type() {
        
        $.ajax('{{ route('storekeeper_role.ajax_get_second_type') }}', {
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
        get_second_type();
    });

    function get_item() {
        
        $.ajax('{{ route('storekeeper_role.ajax_get_item') }}', {
            type : "GET",
            data : {
                'second' : $('#second').val(),
              
            },
            success : function (data, status){
                console.log(data.responses);
    
                $('#item').html('')
    
                let html_row = '';
    
                for (const iterator of data.responses) {
                    var d = new Date(iterator.created_at);
                 
                    
                    html_row += `
                    <option value="${iterator.id}">${iterator.name}</option>
                   
                    `
                }
               
                $('#item').html(html_row)
            }
        })
    }
    
    $('#second').change( function () {
        get_item();
    });
</script>







@endsection



