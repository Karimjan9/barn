        



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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
                        <li class="breadcrumb-item"><a href="{{ route('rektor_role.prixod_show.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Jihozlar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('rektor_role.prixod_show.index') }}" class="btn btn-primary px-3"></i>Orqaga</a>
            </div>
        </div>


        <hr>
        <div class="row">
            <div class="card-body">

                <div class="">
                    <table class="table table-bordered align-middle mb-0 table table-hover">
                        <thead>
                          <tr>
                            <th class="fixed_header2 align-middle">#</th>
                            <th class="fixed_header2 align-middle">Jihoz nomi</th>
                            <th class="fixed_header2 align-middle">Har birining narxi</th>
                            <th class="fixed_header2 align-middle">Jihoz soni</th>
                            <th class="fixed_header2 align-middle">Hammasining narxi</th>
                            <th class="fixed_header2 align-middle">Hammasining narxi So'mda</th>
                            <th class="fixed_header2 align-middle">Harakatlar</th>
                
                          </tr> 
                        </thead>
                        <tbody>
                        @foreach ($prixods as $key=>$prixod)
                          <tr data-toggle="collapse" id="{{ 'table1'.$key }}" data-target="{{ '.table1'.$key }}">
                            <td>{{ $key+1 }}</td>
                                <td>{{ $prixod->get_item_name->name }} </td>
                                <td>{{ number_format($prixod->cost_of_per ,2,","," ")}} {{ $prixod->get_currency->name }}</td>
                                <td>{{ $prixod->count_of_item}} ta</td>
                                <td>{{  number_format($prixod->count_of_item * $prixod->cost_of_per ,2,","," ")}} {{ $prixod->get_currency->name }}</td>
                                <td>{{  number_format($prixod->count_of_item * $prixod->cost_of_per*$prixod->currency_value ,2,","," ")}} so'm</td>
                                <td><button class="btn btn-default btn-sm">Ma'lumot olish</button></td>
                          </tr>
                      
                          <tr class="{{ 'collapse table1'.$key }}">
                            <td colspan="999">
                              <div>
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>N</th>
                                      <th>Jihoz nomi</th>
                                      <th>Har birining narxi</th>
                                      <th>Sanasi</th>
                
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($prixod->child as $key22=>$item)
                                    <tr>
                                        <td>{{ $key22+1 }}</td>
                                        <td>{{ $item->get_item_name->name }}</td>  
                                        <td>{{ number_format($item->cost_of_per ,2,","," ")}} {{ $item->get_currency->name }}</td>
                                        <td>{{ $item->created_at->format('m-d-Y') }}</td>
                                    </tr>
                                    @endforeach
                                         
                                  

                                  </tbody>
                                  
                                </table>
                                @endforeach
                              </div>
                    <div class="card-body">

                        {{ $prixods->links() }}
                    </div>
                </div>
             </div>
        </div>
        {{-- <div class="card radius-10">
          <div class="card-body">

             <div class="">
                 <table class="table table-bordered align-middle mb-0 table table-hover">
                     <thead class="table-light">
                         <tr>
                          <th class="fixed_header2 align-middle">#</th>
                          <th class="fixed_header2 align-middle">Jihoz nomi</th>
                          <th class="fixed_header2 align-middle">Har birining narxi</th>
                          <th class="fixed_header2 align-middle">Jihoz soni</th>
                          <th class="fixed_header2 align-middle">Hammasining narxi</th>
                          <th class="fixed_header2 align-middle">Hammasining narxi So'mda</th>
                          <th class="fixed_header2 align-middle">Harakatlar</th>
                          

                         </tr>
                     </thead>
                     <tbody>

                      @foreach ($prixods as $key=>$prixod)
                      <tr data-toggle="collapse" id="table1" data-target=".table1">
                        <td>{{ $key+1 }}</td>
                            <td>{{ $prixod->get_item_name->name }} </td>
                            <td>{{ number_format($prixod->cost_of_per ,2,","," ")}} {{ $prixod->get_currency->name }}</td>
                            <td>{{ $prixod->count_of_item}} ta</td>
                            <td>{{  number_format($prixod->count_of_item * $prixod->cost_of_per ,2,","," ")}} {{ $prixod->get_currency->name }}</td>
                            <td>{{  number_format($prixod->count_of_item * $prixod->cost_of_per*$prixod->currency_value ,2,","," ")}} so'm</td>
                            <td><button class="btn btn-default btn-sm">View More</button></td>
                  
                             </tr>
                         @endforeach
                         <tr class="collapse table1">
                          <td colspan="999">
                            <div>
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                    <th>Column 3</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Column 1</td>
                                    <td>Column 2</td>
                                    <td>Column 3</td>
                                  </tr>
                                  <tr>
                                    <td>Column 1</td>
                                    <td>Column 2</td>
                                    <td>Column 3</td>
                                  </tr>
                                  <tr>
                                    <td>Column 1</td>
                                    <td>Column 2</td>
                                    <td>Column 3</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </td>
                        </tr>
                     </tbody>
                 </table>
                 <div class="card-body">

                     {{ $prixods->links() }}
                 </div>
             </div> --}}
          </div>
     </div>
</div>


@endsection

@section('scripte_include_end_body')
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection



