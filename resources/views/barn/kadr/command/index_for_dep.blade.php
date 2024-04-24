@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Foydalanuvchi</div>
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
            <h6 class="mb-0 text-uppercase">Barcha buyrug'lar </h6>
        </div>

       


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle " scope="col">#</th>
                                    <th class="fixed_header2 align-middle " scope="col">Xodim</th>
                                    <th class="fixed_header2 align-middle " scope="col">Avvalgi bo'lim</th>
                                    <th class="fixed_header2 align-middle" scope="col">Hozirgi bo'lim</th>
                                    <th class="fixed_header2 align-middle" scope="col">Buyrug' rasmi</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($commands as $i => $command)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $command->get_user_name->full_name }}
                                        </td>
                                        <td>
                                            {{ $command->get_old_dep->name}}
                                        </td>
                                        <td>
                                            {{ $command->get_new_dep->name}}
                                        </td>
                                        <td>
                                            {{-- {{($command->get_com_file) }} --}}
                                            @php
                                                $file=$command->get_com_file;
                                            @endphp
                                            <a href="{{ url('storage/files'."$file->path_of_file"."/"."$file->old_name"."$file->exp") }}" target="_blank" title="Rasm">Rasm</a>
                                        </td>
                                        {{-- <td class=" align-items-center">
                                            <a href="{{ route('kadr_role.change.departament',['user'=>$user->id]) }}" class="btn btn-sm btn-success text-white me-2"></i>Bo'lim o'zgartirish</a>
                                          
                                        </td>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('kadr_role.actions.edit',['action'=>$user->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>Profil sozlash</a>
                                            <form action="" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="Bo'shatish">
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">

                            {{ $commands->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection