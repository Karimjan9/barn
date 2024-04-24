@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Lavozimlar</div>
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
            <h6 class="mb-0 text-uppercase">Barcha lavozimlar</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('kadr_role.career_employee.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi mansab qo`shish</a>
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
                                    <th class="fixed_header2 align-middle">Ish nomi</th>
                                    <th class="fixed_header2 align-middle">Stavkasi</th>
                                    <th class="fixed_header2 align-middle">Bo'linishi</th>
                                    <th class="fixed_header2 align-middle">Bo'lim</th>
                                    <th class="fixed_header2 align-middle">Harakatlar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($careers as $i => $career)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $career->career_name }}
                                        </td>
                                        <td>{{  $career->rate}}</td>
                                        <td>
                                        @if ( $career->divide==1)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"   checked disabled>
                                            
                                            </label>
                                          </div>
                                        @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  disabled>
                                          
                                            </label>
                                          </div>
                                        @endif
                                        </td>
                                        <td>{{ $career->get_dep->name }}</td>
                            
                                       
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('kadr_role.career_employee.edit',['career_employee'=>$career->id]) }}" class="btn btn-sm btn-warning text-white me-2"></i>O'zgartirish</a>
                                            {{-- <a href="" class="btn btn-danger px-1"></i>O'chirish</a> --}}
                                            <form action="{{ route('kadr_role.career_employee.destroy',['career_employee'=>$career->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-danger confirm-button" type="submit" value="O'chirish">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">

                            {{ $careers->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection