        



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
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('user_role.list_petition') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi ariza</a>
            </div>
        </div>


        <hr>
        <div class="row">
            <div class="card-body">

                <div class="">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="fixed_header2 align-middle">#</th>
                                <th class="fixed_header2 align-middle">Jihoz turi</th>
                                <th class="fixed_header2 align-middle">Jihoz  </th>
                                <th class="fixed_header2 align-middle">Jihoz soni</th>
                                <th class="fixed_header2 align-middle">Mulohaza</th>
     
                                <th class="fixed_header2 align-middle" >Status</th>
                                <th class="fixed_header2 align-middle" >Berilgan vaqti</th>


                              

                                {{-- <th class="fixed_header2 align-middle">Delete</th> --}}


                            </tr>
                        </thead>
                        <tbody>
                        {{-- @dd($all_inf) --}}
                            @foreach ($asks as $key=>$ask)
                            <tr>
                        
                            <td>{{ $key+1 }}</td>
                            <td>{{ $ask->get_first_type->name_of_type }}</td>
                            <td>{{ $ask->get_second_type->name }}</td>
                            <td>{{ $ask->number}}</td>
                            <td>{{ $ask->description}}</td>
                            <td>
                              
                            @if ($ask->status==0)
                            <button type="button" class="btn btn-secondary btn-lg" disabled>Ko'rilmadi</button>
                            @elseif ($ask->status==1)
                            <button type="button" class="btn btn-success btn-lg" disabled>Ruxsat berildi</button>
                            @else
                            <button type="button" class="btn btn-danger btn-lg" disabled>Rad etildi</button>
                            @endif</td>
                            <td>{{ $ask->created_at->format('d-m-Y')}}</td>
                                

                            {{-- <td class="d-flex align-items-center">
                                       
                                        <form action="" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <input class="btn btn-sm btn-danger confirm-button" type="submit" value="Bo'shatish">
                                        </form>
                                    </td> --}}
                              {{-- <td> <a href="{{ route('storekeeper_role.prixod.show',['prixod'=>$ask->id]) }}" class="btn btn-sm btn-primary text-white me-2"></i>   Show   </a></td> --}}
                              {{-- <td>
                                <form action="{{ route('storekeeper_role.type_item_take.destroy',['type_item_take'=>$item->id]) }}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <input class="btn btn-sm btn-danger confirm-button"  type="submit" value="Delete type" onclick="return confirm('Are you sure to delete this ?');" >
                              </form>
                              </td> --}}
                            </tr>
                        @endforeach
                  
                          
                         
                        </tbody>
                    </table>
                  
                    <div class="card-body">

                        {{ $asks->links() }}
                    </div>
                </div>
             </div>
        </div>
  
</div>


@endsection

@section('scripte_include_end_body')



@endsection



