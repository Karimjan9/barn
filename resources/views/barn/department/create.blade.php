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
            <div class="breadcrumb-title pe-3">Xabarnoma(SMS)</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" >Xabar(SMS) qo`shish</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase" >Xabar qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary" >Ma'lumotlarni to'ldiring</h5>
                           
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="{{ route('kadr_role.department_employee.store') }}">
                            @csrf
                            {{-- <div class="col-md-12">
                                <label for="number" class="form-label">Qabul qiluvchi</label>
                            <select name="user" id="user" class="form-select form-select-lg mb-3" >
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->full_name }}
                                    @if ($user->level_id==2 )
                                    <p >-mudir</p>
                                @endif
                                </option>
                                
                           
                                @endforeach
                              
                            </select> --}}
                        
                            {{-- @foreach ($array as $key=>$items)
                            @dd($items[0]) 
                            @foreach ($items[0] as $item)
                                    
                          
                                      
                            @endforeach
                      @endforeach --}}
                            <div class="col-md-12">
                                <label for="message_body" class="form-label">Bo'lim nomi</label>
                                <input type="text" name="department_name" class="form-control" id="message_body">
                            </div>
                            <br>
                          
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
                                                  
                                                        <option value="{{ $item->id }}" >{{ $item->name }} </option>
                               
                                                      </optgroup>
                                            @endforeach
                                      @endforeach
                                   
                                  
                                        
                                  
                                
                                </select>
                            </div>
                  
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Yuborish</button>
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

</script>
@endsection

