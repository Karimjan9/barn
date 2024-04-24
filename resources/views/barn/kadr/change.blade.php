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
                        <form class="row g-3" method="post" action="{{ route('kadr_role.change.departament.store',['user'=>$users->id]) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <label for="message_body" class="form-label">Buyruq rasmi</label>
                            <input class="form-control" name='file' type="file" id="formFile" >
                            </div>
                            <div class="col-md-12">
                             
                                <label for="message_body" class="form-label">Bo'lim tanlash</label>
                                {{-- @dd($array[0]) --}}

                                <select name="branch" class="form-select form-select-lg mb-3">
                                    <optgroup label="OXU">
                                        <option value="1">Bosh bo'lim</option>
                                       
                                      </optgroup>
                                      @foreach ($array as $key=>$items)
                                         <optgroup label="{{ $items[0]->name }}">
                                            @foreach ($items[1] as $item)
                                                    {{-- @dd($item) --}}
                                                 
                                                        <option value="{{ $item->id }}"  @if ($item->id==$users->departament_id)
                                                            selected
                                                        @endif>{{ $item->name }} </option>
                               
                                                      </optgroup>
                                            @endforeach
                                      @endforeach
                                   
                                  
                                        
                                  
                                
                                </select>
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

@endsection