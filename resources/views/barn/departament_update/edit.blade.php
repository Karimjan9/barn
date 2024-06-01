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
                        {{-- @dd($departament->id) --}}
                        <form class="row g-3" method="post" action="{{ route('kadr_role.department_update.update',['department_update'=>$departament->id]) }}">
                            @csrf
                            @method("PUT")
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
                                <input type="text" name="name" value="{{ $departament->name }}" class="form-control" id="message_body">
                            </div>
                            <br>
                          
                            <div class="col-md-12">
                             
                                <label for="message_body" class="form-label">Javogar shaxs</label>

                                <select name="res_person" id="res_person" class="form-select form-select-lg mb-3">
                                    <option value="" >Null </option>
                                      @foreach ($users as $key=>$user)
                                        
                                                  
                                                        <option value="{{ $user->id }}" 
                                                            @if ($user->id==$departament->res_person)
                                                                @selected(true)
                                                            @endif>{{ $user->full_name }} </option>
                               
                                                    
                                      @endforeach
                        
                                
                                </select>
                            </div>

                            <div class="col-md-12">
                             
                                <label for="message_body" class="form-label">Bino tanlash</label>

                                <select name="building_id" id="building_id" class="form-select form-select-lg mb-3">
                                   
                                      @foreach ($buildings as $key=>$building)
                                        
                                                  
                                                        <option value="{{ $building->id }}" 
                                                        @if ( $building->id==$departament->building_id)
                                                            @selected(true)
                                                        @endif >{{ $building->name }} </option>
                               
                                                    
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

