@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@section('content')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'บันทึกข้อมูลรถเรียบร้อย',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card ">
                    <div class="card-header">
                        <h3>เพิ่มกิจกรรม</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <form action="{{ route('addproduct') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="product">ชื่อรายการ</label>
                                                        <input type="text" class="form-control" name="product">
                                                    </div>
                                                </div>

                                                <div class=" col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="cash">ราคา
                                                        </label>
                                                        <input type="text" class="form-control" name="cash">
                                                        </select>
                                                    </div>
                                                </div>






                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <input type="submit" value="เพิ่ม" class="btn btn-success "
                                            style="margin-left: 40%">
                                        @error('accessories_number')
                                            <div class="my-2">
                                                <span class="text-danger my-2"> {{ $message }} </span>
                                            </div>
                                        @enderror

                                        @error('accessories_name')
                                            <div class="my-2">
                                                <span class="text-danger my-2"> {{ $message }} </span>
                                            </div>
                                        @enderror
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">รายการกิจกรรม </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr align="center">

                                    <th scope="col" class="sort" data-sort="name">ชื่อรายการ</th>
                                    <th scope="col" class="sort" data-sort="status">ราคา</th>

                                    <th scope="col" class="sort" data-sort="status">เวลาเพิ่ม</th>

                                    <th scope="col">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="list">


                                @foreach ($test as $row)


                                    <tr class="ss" align="center">

                                        <td>{{ $row->product }}</td>
                                        <td>{{ $row->cash }}</td>
                                        <td> {{ $row->created_at }}</td>



                                        <td>

                                            <a href="{{ url('/product/delete/' . $row->id) }}"
                                                class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')"> </a>
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

@endsection
