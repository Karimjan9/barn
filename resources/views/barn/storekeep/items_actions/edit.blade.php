



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
            <div class="breadcrumb-title pe-3">Jihoz o'zgartirish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Jihoz o'zgartirish</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Jihoz yangilash</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <form class="row g-3" method="post" action="{{ route('storekeeper_role.items.update',['item'=>$item->id])}}">
                            @csrf
                            @method("PUT")
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Jihoz nomi</label>
                                <input type="text" name="name" value="{{ $item->name }}" class="form-control" id="full_name">
                            </div>
                           
                            <div class="col-md-8 mb-3">
                                {{-- <input type="number"     id="" value="0.0"> --}}
                                <label for="bodily" class="form-label">Moddiyligi turi</label>
            
                                        <select name="bodily" id='bodily' class="form-select form-select-lg mb-3">

                                        @foreach ($bodilys as $key=>$bodily)
                                
                                            
                                        <option value="{{ $bodily->id }}" 
                                            @if ($bodily->bodily==$item->bodily)
                                                @selected(true)
                                            @endif
                                            >{{ $bodily->name }} </option>
                
                                        @endforeach

                                            </select> 
                            </div>
                            
                            {{-- <div class="col-md-8 mb-3">
                                <label for="first_type" class="form-label">Jihoz turi</label>
            
                                        <select name="first" id='first_type' class="form-select form-select-lg mb-3">

                                        @foreach ($first_types as $key=>$first_type)
                                
                                            
                                        <option value="{{ $first_type->id }}" 
                                            
                                            @if ($first_type->id==$item->first)
                                                @selected(true)
                                            @endif>{{ $first_type->name_of_type }} </option>
                
                                        @endforeach

                                        </select> 
                        </div> --}}
                        <div class="col-md-8 mb-3">
                            {{-- <input type="number"     id="" value="0.0"> --}}
                            <label for="second_type" class="form-label">Jihoz nomi</label>
        
                                    <select name="second" id='second_type' class="form-select form-select-lg mb-3">
                                        @foreach ($second_types as $key=>$second_type)
                                
                                            
                                        <option value="{{ $second_type->id }}" 
                                            
                                            @if ($second_type->id==$item->second)
                                                @selected(true)
                                            @endif>{{ $second_type->name }} </option>
                
                                        @endforeach

                                    </select> 
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="second_type" class="form-label">Jihoz birligi</label>
        
                                    <select name="unity_id" id='second_type' class="form-select form-select-lg mb-3">
    
                                        @foreach ($unitys as $key=>$unity)
                                        
    
                                        <option value="{{ $unity->id }}" 
                                            @if ($unity->id==$item->unity_id)
                                                @selected(true)
                                            @endif
                                        >{{ $unity->name }} </option>
                                            
                                        @endforeach
                                    </select> 
                            </div>
                            {{-- <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Kelgan soni</label>
                                <input type="number" value="{{ $item->extant-$item->absent }}" name="extant" class="form-control" id="extant">
                            </div> --}}
                            <div class="col-md-12">
                                <label for="description" class="form-label">Jihoz tasnifi</label>
                                <textarea class="form-control"  id="description" name="description" rows="8">{{ $item->description }}</textarea>
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

<script>
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
</script>

@endsection



