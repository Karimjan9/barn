        



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
            <div class="breadcrumb-title pe-3">Arizalar qismi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Arizalar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Yangi ariza</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center">
                            <div class="ms-auto">
                                <a href="{{ route('user_role.users_petitions.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Ariza qo'shish</a>
                                <br>
                            </div>
                        </div>
                        <br>
                        {{-- @dd($lists) --}}
                        <form class="row g-3" method="post" action="{{ route('user_role.petition_store_all')}}">
                            @csrf

                            <input type="hidden" name="petitions" value="{{ json_encode($petitions) }}">

                      
                                    <div class="row">
                                        <div class="card-body">
                
                                            <div class="">
                                                <table class="table table-bordered align-middle mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="fixed_header2 align-middle">#</th>
                                                            <th class="fixed_header2 align-middle">Jihoz turi</th>
                                                            <th class="fixed_header2 align-middle">Jihoz nomi</th>
                                                  
                                                            <th class="fixed_header2 align-middle">Jihoz nomi</th>
                                                            <th class="fixed_header2 align-middle">Mulohaza </th>
                                                 
                                                            <th class="fixed_header2 align-middle" >Harakatlar</th>
                                                            <th class="fixed_header2 align-middle" >O'shirish</th>

                                                            {{-- <th class="fixed_header2 align-middle">Delete</th> --}}
                            
                            
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                    @foreach ($lists as $p_key=>$list)
                                                        @foreach ($list as $key=>$one)
                                                            <tr>
                                                    
                                                            <td>{{ $p_key+1 }}</td>
                                                            <td>{{  $one->name }}</td>
                                                            <td>{{  $one->get_first_type->name_of_type }}</td>
                                                            <td>{{ $petitions[$p_key]['number']}}</td>
                                                            <td>{{ $petitions[$p_key]['description']  }}</td>
                                                          
                                                        
                                                                
                                
                                                            {{-- <td class="d-flex align-items-center">
                                                                    
                                                                        <form action="" method="post">
                                                                            @csrf
                                                                            @method("DELETE")
                                                                            <input class="btn btn-sm btn-danger confirm-button" type="submit" value="Bo'shatish">
                                                                        </form>
                                                                    </td> --}}
                                                            <td> <a href="{{ route('user_role.users_petitions.edit',['users_petition'=>$p_key]) }}" class="btn btn-sm btn-warning text-white me-2"></i>O'zgartitrish</a></td>
                                                            <td>
                                                                <form action="{{ route('user_role.users_petitions.destroy',['users_petition'=>$p_key]) }}" method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                <input class="btn btn-sm btn-danger confirm-button"  type="submit" value="Delete" onclick="return confirm('Are you sure to delete this ?');" >
                                                                </form>
                                                            </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    
                                                    
                                                    </tbody>
                                                </table>
                                                <br>
                                              
                                              

                                                <br>
                                            </div>
                                        </div>
                                    </div>
                           
                           
                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-primary px-5">Saqlash    </button>
                            </div>
                            @method("POST")
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



