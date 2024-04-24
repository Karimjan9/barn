



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



@section('body')

<div class="page-wrapper">
   
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> Cargo qo'shish</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('storekeeper_role.actions.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi Cargo </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="starter-template">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase"> Cargo qo'shish</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form action="{{  route('bugalter_role.accountant.create') }}" class="row g-3" method="GET">
                               
                        <div class="col-md-8 mb-3">
                            <label for="first_type" class="form-label">J</label>
                          <select name="item" id="item" class="form-select form-select-lg mb-3">
                          
                       
                            @foreach ($items as $key=>$item)
                                            
                              <option value="{{ $item->id}}" >{{ $item->name }} </option>
                              <input type="hidden"  id="{{$item->id}}" value="{{ $item->extant-$item->absent }}">
                    
                            @endforeach

                            

                          </select>
                          <input type="hidden" name="ask" id="ask" value="{{ $ask->number }}">
                          
                          <input type="hidden" name="last" id="last" value="{{ $last }}">

                          </div>
                            <div class="col-md-8 mb-3" >
                                <label for="full_name" class="form-label">Number</label>
                                <input type="number" name="number"   step="1" class="form-control" id="number">
                            </div>
                           
                               <input type="hidden"   name='show_id' value="{{ $id }}">
                    
                            <div class="col-12 mb-3">

                                <button type="submit" class="btn btn-primary px-5">Store</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">

               <div class="">
                   <table class="table table-bordered align-middle mb-0">
                       <thead class="table-light">
                           <tr>
                               <th class="fixed_header2 align-middle">#</th>
                               <th class="fixed_header2 align-middle">Name </th>
                             
                               <th class="fixed_header2 align-middle" >Number</th>

                            

                           </tr>
                       </thead>
                       <tbody id="table_app">

                        @foreach (($data) as $key => $dat)
                           <tr>
                           <td>{{ $key+1}}</td>
                            <td>{{$dat->name  }}</td>
                            <td>{{ $dat->get }}</td>
                        
           
 
                           </tr>
                       @endforeach
                           


                       </tbody>
                   </table>
                 <br>
                 <form action="{{ route('bugalter_role.accountant.store') }}" method="post" class="row g-3">
                    @csrf
                    <div class="col-10 mb-3 text-end">
                        <input type="hidden"   name='show_id' value="{{ $id }}">
                        @if ($data==null)
                        <button type="submit" class="btn btn-primary px-5 text-end" disabled>Order</button>
                        @else
                        <button type="submit" class="btn btn-primary px-5 text-end">Order</button>
                        @endif
                      

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
let a=$('#item').val();
let b=$('#'+a).val();
let c=$('#ask').val();
let d=$('#last').val();
// console.log(d);
if (b>d) {
    $(function(){
   $("input[type='number']").prop('min',0);
   $("input[type='number']").prop('max',d);
});
} else {
    $(function(){
   $("input[type='number']").prop('min',0);
   $("input[type='number']").prop('max',b);
        });
}
if ($('#number').val()==0) {
    
}


</script>
@endsection



