@extends('template')

@section('style')

    <style>

        tbody th {
            position: -webkit-sticky; /* for Safari */
            position: sticky;
            left: 0;
            background: #FFF;
            border-right: 1px solid #CCC;
        }

        .fixed_header {
            position: -webkit-sticky; /* for Safari */
            position: sticky;
            left: 0;
            /* background: #8f8d8d; */
            border-right: 1px solid #CCC;
        }

        .fixed_header2 {
            position: -webkit-sticky; /* for Safari */
            position: sticky;
            top: 0;
            /* background: #8f8d8d; */
            border-right: 1px solid #CCC;
        }

        .criteria {
            width : 50px;
        }

    </style>

@endsection

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Xodimlar</div>
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
            <h6 class="mb-0 text-uppercase">Xodimlar bazasi</h6>
        </div>
        <hr>

        <div class="card radius-10">
                 <div class="card-body">
                    <select class="form-select mb-3" aria-label="Default select example" id="type_output">
                        <option value="0">Barchasi</option>
                        @foreach ($departamets as $departamet)
                            <option value="{{ $departamet->id }}">{{ $departamet->name }}</option>
                        @endforeach
                    </select>

                    <div class="">
                        <table id="mytable" class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">F.I.O </th>
                                    <th id="sort_status" class="fixed_header2 align-middle">Status <div id="icon_s"> <i class="lni lni-arrow-up"></i> </div></th>
                                    @foreach ($criterias as $item)
                                        <th scope="col" class="align-middle fixed_header2"  style=" width: 100px; word-wrap: break-word !important;">{{ $item->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody id="data_list">
                                @foreach ($teachers as $i => $teacher)
                                    <tr id="teacher_{{ $teacher->id }}" class="departaments departament_{{ $teacher->departament_id }}" style="display: ;">
                                        <td class="nomer">
                                            {{ ++$i }}
                                        </td>
                                        <th style="background-color: white;">
                                            <a href="{{ route("superadmin.employees.show", ["employee" => $teacher->id ]) }}">{{ $teacher->full_name }}</a> <div id="precent_{{ $teacher->id }}">{{ $teacher->percent }} %</div>
                                        </th>
                                        
                                        <td>
                                            <div class="progress" style="height: 15px;">
                                                <div id="person_{{ $teacher->id }}" data-value="{{ $teacher->percent }}" class="progress-bar bg-gradient-quepal" role="progressbar" style="width: {{ $teacher->percent }}%"></div>
                                            </div>
                                        </td>
                                        @foreach ($criterias as $num => $item)

                                            <td>

                                                @if ($item->rules['rules'])

                                                    @if ($item->rules["rules"]["checkbox"]['limit'] == 1)
                                                    
                                                        <input
                                                        class="form-check-input criterias criteria_{{ $item->id }}_{{ $teacher->id }}"
                                                        type="checkbox"
                                                        data-percent="{{ $item->percent }}"
                                                        data-increase="{{ $item->increase }}"
                                                        data-person_id="{{ $teacher->id }}"
                                                        data-id="{{ $item->id }}"
                                                        data-inclide-part="{{ $i == 0 ? $i + 1 : $i -1 }}"
                                                        data-position="{{ $i }}"
                                                        id="part_{{ $item->id }}_{{ $i }}_{{ $teacher->id }}"
                                                        value=""
                                                        @if ( $teacher->on_criteria()->where('user_id', '=', $teacher->id)->where('criteria_id', '=', $item->id)->first() )
                                                        
                                                            {{ $teacher->on_criteria()->where('user_id', '=', $teacher->id)->where('criteria_id', '=', $item->id)->first()->status == 1 ? "checked" : "" }}

                                                        @endif
                                                        >
                                                        
                                                    @else
                                                        
                                                        @for ($i = 0; $i < $item->rules["rules"]["checkbox"]['limit']; $i++)
                                                            <input
                                                            class="form-check-input criterias criteria_{{ $item->id }}_{{ $teacher->id }}"
                                                            type="checkbox"
                                                            data-percent="{{ $item->percent }}"
                                                            data-increase="{{ $item->increase }}"
                                                            data-person_id="{{ $teacher->id }}"
                                                            data-id="{{ $item->id }}"
                                                            data-inclide-part="{{ $i == 0 ? $i + 1 : $i -1 }}"
                                                            data-position="{{ $i }}"
                                                            id="part_{{ $item->id }}_{{ $i }}_{{ $teacher->id }}"
                                                            value=""
                                                            @if ( $teacher->on_criteria()->where('user_id', '=', $teacher->id)->where('criteria_id', '=', $item->id)->first() )
                                                            
                                                                {{ $teacher->on_criteria()->where('user_id', '=', $teacher->id)->where('criteria_id', '=', $item->id)->first()['states']['checkbox']['position'][$i]['included'] == 1 ? "checked" : "" }}

                                                            @endif
                                                            >
                                                        @endfor
                                                    @endif

                                                @endif
                                            </td>

                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>
<input type="hidden" id="sort_status_flag" value="asc">
<script>

    let users = {{ Js::from($teachers) }};

    let user_sort = true;

    function set_nomer() {
        
        let i = 1;

        $('.nomer').each(function () {

            if ($(this).parent().css('display') != 'none') {
                $(this).html(i);
                i++;
            }
        })

    }

    function set_data_criteria(criteria_id, user_id, data, increase, status, type, position) {

        $.ajax('/set_data_criteria', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id" : user_id,
                "criteria_id" : criteria_id,
                "data" : data,
                "increase" : increase,
                "status" : status,
                "type" : type,
                "position" : position
            },
            success: function (data, status) {

                users = data.users;

                $(`#person_${ data.user_id }`).css("width", `${data.percent}%`);

                $(`#person_${ data.user_id }`).data("value", data.percent);

                $(`#precent_${ data.user_id }`).html(`${data.percent} %`);

            },
            error: function (jqXhr, textStatus, errorMessage) {
                
                console.log(errorMessage);
            }
        });
    }

    $("body").on("click", '.criterias', function (e) {

        set_data_criteria(
            $(this).data("id"), 
            $(this).data("person_id"), 
            $(this).data("percent"), 
            $(this).data("increase"),
            $(this).is(":checked") ? 1 : 0,
            "checkbox",
            $(this).data("position")
        );

        if ($(this).is(":checked")) {
            $(this).attr("checked", "");
        }else{
            $(this).removeAttr("checked");
        }
    });


    $("#type_output").on("change", function (e) {

        let type_output = $("#type_output").val();

        if(type_output == 0){

            $(`.departaments`).css("display", "");
        }else{

            $('.departaments').css("display", "none")
            $(`.departament_${type_output}`).css("display", "");
        }

        set_nomer();
    });

    $("#sort_status").on("click", function () {
       
        if (user_sort) {
            
            users.sort((a, b) => a.percent < b.percent ? 1 : -1);

            $('#icon_s').html('<i class="lni lni-arrow-down"></i>');
        }else{
            users.sort((a, b) => a.percent > b.percent ? 1 : -1);
            
            $('#icon_s').html('<i class="lni lni-arrow-up"></i>');
        }
        
        user_sort = !user_sort;

        let html = '';

        let type_output = $("#type_output").val();

        for (const iterator of users) {
            
            if (type_output != 0) {
                if (iterator.departament_id == type_output) {
                    
                    html += `<tr id='teacher_${ iterator.id }' class='departaments departament_${ iterator.departament_id }'> ${$(`#teacher_${ iterator.id }`).detach().html()} </tr>`;
                }else{
                    html += `<tr id='teacher_${ iterator.id }' class='departaments departament_${ iterator.departament_id }' style="display: none;"> ${$(`#teacher_${ iterator.id }`).detach().html()} </tr>`;

                }
            }else{

                html += `<tr id='teacher_${ iterator.id }' class='departaments departament_${ iterator.departament_id }'> ${$(`#teacher_${ iterator.id }`).detach().html()} </tr>`;
            }
            
        }

        $("#data_list").html(html);

        set_nomer();
    });

</script>

@endsection
