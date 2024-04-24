@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Jihozlar</div>
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
            <h6 class="mb-0 text-uppercase">Yetishmayotgan jihozlar</h6>
        </div>

        <hr>

        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle"> Foydalanuvchi</th>
                                    <th class="fixed_header2 align-middle">Jihoz nomi</th>
                                    <th class="fixed_header2 align-middle">Jihoz soni</th>
                                 

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($commands as $i => $command)
                                    <tr class="alert alert-danger">
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $command->get_ask->get_user->full_name?? User }}
                                        </td>
                                        <td>{{  $command->get_ask->get_second_type->name ?? Item}}</td>
                                      
                                        <td>{{ $command->get_ask->number}}</td>


                                     
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