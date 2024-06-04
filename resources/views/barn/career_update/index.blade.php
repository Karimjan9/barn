

@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Bo'limlar</div>
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
            <h6 class="mb-0 text-uppercase">Bo'limlarga jihozlar berish</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('kadr_role.departament_list') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Jihozlar berish!</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Bo'lim nomi</th>
                                   
                                    <th class="fixed_header2 align-middle">Berilgan jihozlar soni</th>

                                    <th class="fixed_header2 align-middle">Masul shaxs</th>
                                    <th class="fixed_header2 align-middle">Bino nomi</th>
                                    <th class="fixed_header2 align-middle">Harakatlar</th>
                                    <th class="fixed_header2 align-middle">Tasnif</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($departaments as $i => $departament)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $departament->name }}
                                        </td>
                                   
                                        <td>{{ $departament->get_give_item_count}}</td>

                                        <td>{{ $departament->get_user->full_name?? "Berilmagan" }}</td>
                            
                                        <td>{{ $departament->get_building->name??"Berilmagan"}}</td>

                                        <td>{{ $departament->get_building->name??"Berilmagan"}}</td>

                                        <td> <a href="{{ route('kadr_role.career_update.show',['career_update'=>$departament->id]) }}" class="btn btn-sm btn-primary text-white me-2"></i>   Show   </a></td>
                                        {{-- <td class="d-flex align-items-center">
                                            <a href="{{ route('kadr_role.career_update.edit',['career_update'=>$career->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>O'zgartirish</a>
                                            <form action="{{ route('kadr_role.career_update.destroy',['career_update'=>$career->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="O'chirish" onclick="return confirm('Are you sure to delete this ?');">
                                            </form>
                                        </td> --}}
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
   </div>
</div>

@endsection