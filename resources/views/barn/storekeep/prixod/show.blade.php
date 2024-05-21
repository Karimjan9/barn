        



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
            <div class="breadcrumb-title pe-3">Jo'natmalar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Jihozlar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('storekeeper_role.prixod.index') }}" class="btn btn-primary px-3"></i>Orqaga</a>
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
                                <th class="fixed_header2 align-middle">Jihoz nomi</th>
                                <th class="fixed_header2 align-middle">Valyuta</th>
                                <th class="fixed_header2 align-middle">Har birining narxi</th>
                                <th class="fixed_header2 align-middle">Jihoz soni</th>
                                <th class="fixed_header2 align-middle">Valyuta bo'yicha</th>
                                <th class="fixed_header2 align-middle">Hammasining narxi</th>


     
                      


                              

                                {{-- <th class="fixed_header2 align-middle">Delete</th> --}}


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prixods as $key=>$prixod)
                            {{-- @dd($prixod->get_currency) --}}

                            <tr>
                        
                            <td>{{ $key+1 }}</td>
                            <td>{{ $prixod->get_item_name->name }} </td>
                            <td>{{  $prixod->get_currency->name }} </td>
                            <td>{{ $prixod->cost_of_per}} {{ $prixod->get_currency->name }}</td>
                            <td>{{ $prixod->count_of_item}} ta</td>
                            <td>{{  $prixod->count_of_item * $prixod->cost_of_per}}  {{ $prixod->get_currency->name }} </td>
                            <td>{{ $prixod->count_of_item * $prixod->cost_of_per*$prixod->currency_value}} so'm</td>

                         
                                

                            </tr>
                        @endforeach
                  
                          
                         
                        </tbody>
                    </table>
                    <div class="card-body">

                        {{ $prixods->links() }}
                    </div>
                </div>
             </div>
        </div>
  
</div>


@endsection

@section('scripte_include_end_body')



@endsection



