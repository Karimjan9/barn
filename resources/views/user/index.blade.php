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
            <h6 class="mb-0 text-uppercase">Barcha foydalanuvchilar</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('emloyees.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi foydalanuvchi qo`shish</a>
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
                                    <th class="fixed_header2 align-middle">Login</th>
                                    <th class="fixed_header2 align-middle">F.I.SH</th>
                                    <th class="fixed_header2 align-middle">Rol</th>
                                    <th class="fixed_header2 align-middle">O'zgartirish</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $i => $user)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $user->login }}
                                        </td>
                                        <td>
                                            {{ $user->full_name }}
                                        </td>
                                        <td>
                                            {{ __($user->user_level->name) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('emloyees.edit',['emloyee'=>$user->id]) }}" class="btn btn-warning px-1"></i>O'zgartirish</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">

                            {{ $users->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection