



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
                        <form class="row g-3" method="post" action="{{ route('kadr_role.second_data.store',['id'=>$id]) }}"enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Obektivka</label>
                                <br>
                                @if ($second!=null)
                                    @if ($second->obektivka!=null)
                                        <a href="{{ url('storage/files/obektivka/'."$second->obektivka") }}">{{ $second->obektivka }}</a>
                                    @endif
                                @endif
                              
                                <input type="file" name="obektivka" class="form-control" id="full_name">
                            </div>

                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Diplom</label>
                                <br>
                                @if ($second!=null)
                                    @if ($second->diplom!=null)
                                    <a href="{{ url('storage/files/diplom/'."$second->diplom") }}">{{ $second->diplom }}</a>
                                    @endif
                                @endif
                              
                                <input type="file" name="diplom" class="form-control" id="full_name">
                            </div>

                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">3x4 Rasm</label>
                                <br>
                                @if ($second!=null)
                                    @if ($second->user_img!=null)
                                        <a href="{{ url('storage/files/image/'."$second->user_img") }}">{{ $second->user_img}}</a>
                                    @endif
                                @endif
                              
                                <input type="file" name="image" class="form-control" id="full_name">
                            </div>

                         

                            
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Ilmiy unvon</label>
                                <div class="col-md-12">

                              

                                       <select name="title" class="form-select form-select-lg mb-3">
                                         
                                              
                                             @foreach ($academic_title as $key=>$title)
                                               
                                                        <option value="{{ $title->id }}"
                                                            
                                                            @if ($second!=null)
                                                                @if ($second->academic_title_id==$title->id)
                                                                    @selected(true)
                                                                @endif
                                                            @endif
                                                            >{{ $title->name }}</option>
 
                                             @endforeach
                         
                                       
                                       </select>
                                   </div>
                            </div>
                       
                            <div class="col-12 mb-3">
                                <div class="col-md-12">
                                       <label for="message_body" class="form-label">Ilmiy  daraja</label>
       
                                       <select name="degree" class="form-select form-select-lg mb-3">

                                             @foreach ($academic_degree as $key=>$degree)
                                             <option value="{{ $degree->id }}"
                                                @if ($second!=null)
                                                    @if ($second->academic_degree_id==$degree->id)
                                                            @selected(true)                                                    
                                                    @endif
                                                @endif
                                                >{{ $degree->name }}</option>
    
                                             @endforeach

                                       </select>
                                   </div>
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



