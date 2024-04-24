@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Xabarlar(SMS)</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Barcha xabarlar</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('superadmin.sms_message.create',['admin_id'=>$id]) }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi qo`shish</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">
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

                        <div class="col-md-3">
                            <label for="number" class="form-label">SMS Filter</label>
                            <select id="sms_filter" name="sms_filter" class="form-select form-select-lg mb-3" >
                                <option value="1">Pozitiv smslar</option>
                                <option value="2" >Negativ smslar</option>
                                <option value="3" >Umumiy smslar</option>
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="number" class="form-label ">Oylar</label>
                            <select id="month_filter" name="month_filter" class="form-select form-select-lg mb-3" >
                                <option value="1">Yanvar</option>
                                <option value="2" >Fevral</option>
                                <option value="3">Mart</option>
                                <option value="4" >Aprel</option>
                                <option value="5">May</option>
                                <option value="6" >Iyun</option>
                                <option value="7">Iyul</option>
                                <option value="8" >Avgust</option>
                                <option value="9">Sentyabr</option>
                                <option value="10" >Oktyabr</option>
                                <option value="11">Noyabr</option>
                                <option value="12" >Dekabr</option>
                            </select>
                        </div>  
                        <div class=" col-6  ">
                            <label for="number" class="form-label">O'qituvchilar</label>
                            <select id="teacher_id" name="teacher_id" class="form-select form-select-lg mb-3" >
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                @endforeach
                              
                               
                            </select>
                            
                        </div>

                    </div>

                    <div class="col-12">
                    <br>
                    <div class="">
                        <table class="table table-bordered align-middle mb-0"style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Jo'natuvchi</th>
                                    <th class="fixed_header2 align-middle">Qabul qiluvchi</th>
                                    <th class="fixed_header2 align-middle" style="width:30%">Xabar mazmuni</th>
                                    <th class="fixed_header2 align-middle">Status</th>
                                    <th class="fixed_header2 align-middle">Sana</th>
                                </tr>
                            </thead>
                            <tbody id="list_data">

                                @foreach ($messages as $i => $message)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $message->user_sender->full_name }}
                                        </td>
                                        <td>
                                            {{ $message->user_taker->full_name }}
                                        </td>
                                        <td>
                                            @if ($message->type_sms==1)
                                            <div class="border border-3 border-success px-2 py-2 rounded-4">  {{ $message->sms_body }}  </div>
                                            
                                            @else
                                            <div class="border border-3 border-danger px-2 py-2 rounded-4"> {{ $message->sms_body }}</div>
                                            @endif
                                           
                                        </td>
                                        <td>
                                         
                                            @if ($message->status_sms==0)
                                           {{-- <p class="btn btn-danger px-3" disabled > Xabar jo'natilmadi!</p>   --}}
                                           <button type="button" class="btn btn-danger px-3" disabled> Xabar jo'natilmadi!</button>   
                                            @else
                                       
                                            <button type="button" class="btn btn-success px-3" disabled>  Xabar jo'natildi!</button>  
                                            @endif
                                        </td>
                                        <td>
                                            {{ $message->created_at->format('H:i   d-m-Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="card-body">

                            {{ $messages->links() }}
                        </div> --}}
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection


@push('scripte_include_end_body')
<script>

    function filter_group() {
        
        $.ajax('{{ route('superadmin.get_sms_filter',['id'=>$id]) }}', {
            type : "GET",
            data : {
                'sms_filter' : $('#sms_filter').val(),
                'month_filter':$('#month_filter').val()
            },
            success : function (data, status){
                console.log(data);

                $('#list_data').html('')

                let html_row = '';

                for (const iterator of data.messages) {
                    var d = new Date(iterator.created_at);
                 
                    
                    html_row += `
                    
                    <tr>
                        <td>
                            ${ iterator.id }
                        </td>
                        <td>
                            ${ iterator.user_sender.full_name }
                        </td>
                        <td>
                            ${ iterator.user_taker.full_name }
                        </td>
                        <td>
                            ${ iterator.type_sms == 1 ? 
                           `<div class="border border-3 border-success px-2 py-2 rounded-4">   ${ iterator.sms_body}</div>`:
                           `<div class="border border-3 border-danger px-2 py-2 rounded-4"">${ iterator.sms_body }</div>`}
                        </td>
                        <td>
                            ${ iterator.status_sms == 0 ? 
                                '<button type="button" class="btn btn-danger px-3" disabled> Xabar jo\'natilmadi!</button>' : 
                                '<button type="button" class="btn btn-success px-3" disabled>  Xabar jo\'natildi!</button> ' }
                        </td>
                        <td>
                            ${d.getHours()}:${d.getMinutes()}   ${d.getDay() <10 ? '0'+d.getDay():d.getDay()}-${d.getMonth() <10 ? '0'+d.getMonth():d.getMonth()}-${d.getFullYear()}
                        </td>
                    </tr>
                    `
                }

                $('#list_data').html(html_row)
            }
        })
    }

    $('#sms_filter').change( function () {
        filter_group();
    });
    $('#month_filter').change( function () {
        filter_group();
    });
    

    function filter_teacher() {
        
        $.ajax('{{ route('superadmin.get_sms_filter_by_teacher') }}', {
            type : "GET",
            data : {
                'teacher_id' : $('#teacher_id').val(),
               
            },
            success : function (data, status){
                console.log(data);

                $('#list_data').html('')

                let html_row = '';

                for (const iterator of data.messages) {
                    var d = new Date(iterator.created_at);
                 
                    
                    html_row += `
                    
                    <tr>
                        <td>
                            ${ iterator.id }
                        </td>
                        <td>
                            ${ iterator.user_sender.full_name }
                        </td>
                        <td>
                            ${ iterator.user_taker.full_name }
                        </td>
                        <td>
                            ${ iterator.type_sms == 1 ? 
                           `<div class="border border-3 border-success px-2 py-2 rounded-4">   ${ iterator.sms_body}</div>`:
                           `<div class="border border-3 border-danger px-2 py-2 rounded-4"">${ iterator.sms_body }</div>`}
                        </td>
                        <td>
                            ${ iterator.status_sms == 0 ? 
                                '<button type="button" class="btn btn-danger px-3" disabled> Xabar jo\'natilmadi!</button>' : 
                                '<button type="button" class="btn btn-success px-3" disabled>  Xabar jo\'natildi!</button> ' }
                        </td>
                        <td>
                            ${d.getHours()}:${d.getMinutes()}   ${d.getDay() <10 ? '0'+d.getDay():d.getDay()}-${d.getMonth() <10 ? '0'+d.getMonth():d.getMonth()}-${d.getFullYear()}
                        </td>
                    </tr>
                    `
                }

                $('#list_data').html(html_row)
            }
        })
    }

    $('#teacher_id').change( function () {
        filter_teacher();
    });
</script>  
@endpush