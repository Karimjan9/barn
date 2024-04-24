@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Actions</div>
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

        {{-- <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('kadr_role.career_employee.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi mansab qo`shish</a>
            </div>
        </div> --}}


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Item name</th>
                                    <th class="fixed_header2 align-middle">User name</th>
                               
                                    <th class="fixed_header2 align-middle">Action</th>

                                 
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $i => $item)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>{{  $item->get_item->name }}</td>

                                        
                                        <td class="d-flex align-items-center">
                                            {{-- <a  class="btn btn-primary" href="{{ route('admin_barn_role.item_for_order',['order_id'=>$order->id]) }}">Tanlash</a> --}}
                                           
                                          
                                            <form action="{{ route('admin_barn_role.admin_actions.update',['admin_action'=>$item->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                @method('PUT')
                                                <input class="btn btn-sm btn-primary confirm-button" type="submit" value="Berish!">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">

                            {{ $items->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection