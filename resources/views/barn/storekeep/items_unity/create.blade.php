



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
            <div class="breadcrumb-title pe-3">Jihoz Birliki qo'shish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi Birlik nomi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Birlik nomi yaratish</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">

                        <form class="row g-3" method="post" action="{{ route('storekeeper_role.item_unity.store')}}">
                            @csrf
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Birlik nomi</label>
                                <input type="text" name="name" class="form-control" id="full_name">
                            </div>
                            {{-- <div class="col-md-8 mb-3">
                                <label for="first_type" class="form-label">Jihoz turi</label>
            
                                        <select name="first_type" id='first_type' class="form-select form-select-lg mb-3">

                                        @foreach ($first_types as $key=>$first_type)
                                
                                            
                                        <option value="{{ $first_type->id }}" 
                                            >{{ $first_type->name_of_type }} </option>
                
                                        @endforeach

                                        </select> 
                           </div> --}}
                           
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



@endsection



