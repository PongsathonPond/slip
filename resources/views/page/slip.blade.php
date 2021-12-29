@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@section('content')




    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">

                <div class="card ">
                    <div class="card-header">
                        <h3>เพิ่มกิจกรรม</h3>
                    </div>
                    <div class="card-body pt-0">


                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr align="center">

                                    <th scope="col" class="sort" data-sort="status">ลำดับ</th>
                                    <th scope="col" class="sort" data-sort="status">ชื่อ</th>
                                    <th scope="col" class="sort" data-sort="status">นามสกุล</th>
                                    <th scope="col" class="sort" data-sort="status">รหัสนักศึกษา</th>
                                    <th scope="col" class="sort" data-sort="status">รายการ</th>
                                    <th scope="col" class="sort" data-sort="status">เวลาเพิ่มข้อมูล
                                    </th>
                                    <th scope="col" class="sort" data-sort="status">พิมพ์ใบเสร็จ
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="list">

                                @foreach ($listall as $item)




                                    <tr class="ss" align="center">

                                        <td>{{ $listall->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->names }}</td>
                                        <td>{{ $item->lastname }}</td>
                                        <td>

                                            {{ $item->number }}
                                        </td>
                                        <td>
                                            @foreach ($item->listall as $items)
                                                @foreach ($items as $aa)
                                                    {{ $aa }} <br>
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>

                                        <td>

                                            <a href="" class="btn btn-primary fas fa-print"> </a>
                                        </td>

                                    </tr>

                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    {{ $listall->links() }}
                </div>

            </div>
        </div>



    </div>
    </div>
    </div>


@endsection
