        



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

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
@endsection

@section('body')

<div class="page-wrapper">
    {{-- @dd(1) --}}
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Jo'natmalar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('kadr_role.career_update.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Jihozlar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('kadr_role.career_update.index') }}" class="btn btn-primary px-3"></i>Orqaga</a>
            </div>
        </div>


        <hr>
        <div class="ms-auto">
            <a href="{{ route('kadr_role.reset_func_for_dep',['dep_id'=>$id]) }}" class="btn btn-danger px-3" onclick="return confirm('Are you sure to delete this ?');"></i>Reset</a>
        </div>
        <br>
        <div class="row">
            <div class="card-body">

                <div class="">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="fixed_header2 align-middle">#</th>
                                <th class="fixed_header2 align-middle">Jihoz nomi</th>
                                <th class="fixed_header2 align-middle">Jihoz soni</th>
                                {{-- <th class="fixed_header2 align-middle">Har birining narxi</th>
                                <th class="fixed_header2 align-middle">Jihoz soni</th>
                                <th class="fixed_header2 align-middle">Valyuta bo'yicha</th>
                                <th class="fixed_header2 align-middle">Hammasining narxi</th> --}}


     
                      


                              

                                <th class="fixed_header2 align-middle">O'chirish</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departaments as $key=>$departament)
                            {{-- @dd($prixod->get_currency) --}}

                            <tr>
                        
                            <td>{{ $key+1 }}</td>
                            <td>{{ $departament->get_item->name }} </td>
                            <td>{{  $departament->give_item }} </td>
                         
                         
                                
                            <td>
                                @if ( $departament->status==1)
                                    <form action="{{ route('storekeeper_role.items_give_to_barn',['dep_kaf'=>$id]) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input type="hidden" value="{{ $departament->item_id }}" name="item">
                                        <input type="hidden" value="{{ $departament->give_item }}" name="number">

                                        <input class="btn btn-sm btn-danger confirm-button" type="submit" value="O'chirish" onclick="return confirm('Are you sure to delete this ?');" >
                                    </form>
                                @endif
                                
                            </td>
                            </tr>
                        @endforeach
                  
                          
                         
                        </tbody>
                    </table>
                    <div class="card-body">

                        {{ $departaments->links() }}
                    </div>
                </div>
             </div>
        </div>
  
</div>


@endsection

@section('scripte_include_end_body')

{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

@endsection



