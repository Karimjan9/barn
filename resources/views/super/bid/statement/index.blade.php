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

        <hr>

        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Bildirgi beruvchi</th>
                                    <th class="fixed_header2 align-middle">Bildirgi berilgan sana</th>
                                    <th class="fixed_header2 align-middle">Manzil</th>
                                    <th class="fixed_header2 align-middle">Tadbir sanasi</th>
                                    <th class="fixed_header2 align-middle">Para</th>
                                    <th class="fixed_header2 align-middle">Мavzu</th>
                                    <th class="fixed_header2 align-middle">Guruh</th>
                                    <th class="fixed_header2 align-middle">Izoh</th>
                                    <th class="fixed_header2 align-middle" style="width: 18%">Harakatlar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($statements as $i => $statement)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $statement->teacher->full_name }}
                                        </td>
                                        <td>
                                            {{ $statement->date_create() }}
                                        </td>
                                        <td>
                                            {{ $statement->location }}
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
                                            {{ $statement->description }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                @if ($status == 0)
                                                    <form class="col-md-6" action="{{ route("update_statement_status", ['id' => $statement->id]) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="bx bx-add-to-queue mr-1"></i>Qabul qilish</button>
                                                    </form>

                                                    <form class="col-md-6" action="{{ route("update_statement_status", ['id' => $statement->id]) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="2">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash mr-1"></i>Rad etish</button>
                                                    </form>
                                                @endif
                                                @if ($status==1 && $unfulfilled==0)
                                                    <form class="col-md-6" action="{{ route("update_statement_unfulfilled", ['id' => $statement->id,'unfulfilled'=>1]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash mr-1"></i>Bajarilmadi</button>
                                                    </form>
                                               
                                                @endif
                                                <form class="col-md-4">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('superadmin.statement.show', ['statement' => $statement->id]) }}" target="_blank"><i class="bx bx-trash mr-1"></i>Просмотр</a>
                                                </form>
                                            </div>
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
