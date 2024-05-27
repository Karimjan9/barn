



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
            <div class="breadcrumb-title pe-3">Valyuta o'zgartirish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Valyuta</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12">
            @foreach ($errors->all() as $error)
            <br>
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">{{ $error }}</div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Jihoz nomi yangilash</h6>
                <hr>
                <br>
                
                <div class="card border-top border-0 border-4 border-primary">
                    
                    <div class="card-body p-5">

                        <form class="row g-3" method="post" action="{{ route('rektor_role.rektor_currency.update',['rektor_currency'=>$currency->id])}}">
                            @csrf
                            @method("PUT")
                          
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Valyuta nomi</label>
                                <input type="text" name="name" value="{{ $currency->name }}" class="form-control" id="full_name">
                            </div>
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Valyuta qiymati</label>
                                <input type="text" name="value" step="0.01" min="0" value="{{ $currency->value }}" class="form-control" id="full_name">
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



@endsection



