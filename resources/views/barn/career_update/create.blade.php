@extends('template')

@section('style')

    <style>

        .ck-restricted-editing_mode_standard{

            min-height: 500px;
        }
     
        .form-check {
    display: flex;
    align-items: center;
}
.form-check label {
    margin-left: 10px;
    font-size: 18px;
    font-weight: 500;
}
.form-check .form-check-input[type=checkbox] {
    border-radius: .25em;
    height: 50px;
    width: 50px;
}
.form-check .form-check-input[type=radio] {
    border-radius: 100%;
    height: 50px;
    width: 50px;
}
.form-switch .form-check-input[type=checkbox] {
    border-radius: 2em;
    height: 25px;
    width: 50px;
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
            <div class="breadcrumb-title pe-3">Mansab</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" >Mansab qo`shish</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="starter-template">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif
                {{-- @yield('content') --}}
            </div>
           
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase" >Mansab qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary" >Ma'lumotlarni to'ldiring</h5>
                           
                        </div>
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                    <div class="text-white">{{ $error }}</div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="{{ route('kadr_role.career_update.store') }}">
                            @csrf
                
                            <div class="col-md-12">
                                <label for="message_body" class="form-label">Mansab nomi</label>
                                <input type="text" name="name" class="form-control" id="message_body">
                            </div>
                            <br>
                        
                         
                        
                           
                              
                              
                       
                                
                           
                            <br>
                            <div class="col-md-12">
                             
                                <label for="message_body" class="form-label">Bo'lim tanlash</label>
                                {{-- @dd($array[0]) --}}

                                <select name="departament_id" class="form-select form-select-lg mb-3">
                                 
                                       
                                     
                                      @foreach ($departaments as $key=>$items)
                                        
                                                        <option value="{{ $items->id }}" >{{ $items->name }} </option>
                               
                                      @endforeach
                  
                                
                                </select>
                            </div>
                  
                            <br>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Yaratish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>



@endsection

