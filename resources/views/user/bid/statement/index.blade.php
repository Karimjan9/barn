@extends('template')


@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ariza</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Bildirgi</li>

                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Barcha bildirgi</h6>
        </div>

        @if ($status == 0)

            <div class="d-flex align-items-center">
                <div class="ms-auto">
                    <a href="{{ route('user.statement.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Bildirgi yaratish</a>
                </div>
            </div>
        @endif


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Bildirgi berilgan sana</th>
                                    <th class="fixed_header2 align-middle">Tadbir sanasi</th>
                                    <th class="fixed_header2 align-middle">Para</th>
                                    <th class="fixed_header2 align-middle">Мavzu</th>
                                    <th class="fixed_header2 align-middle">Guruh</th>
                                    <th class="fixed_header2 align-middle">Manzil</th>
                                    <th class="fixed_header2 align-middle">Izoh</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($statements as $i => $statement)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $statement->date_create() }}
                                        </td>
                                        <td>
                                            {{ $statement->date_format() }}
                                        </td>
                                        <td>
                                            {{ $statement->pair }}
                                        </td>
                                        <td>
                                            {{ $statement->theme }}
                                        </td>
                                        <td>
                                            {{ $statement->group }} - {{ $statement->group_name }}
                                        </td>
                                        <td>
                                            {{ $statement->location}}
                                        </td>
                                        <td>
                                            {{ $statement->description }}
                                        </td>
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

@endsection
