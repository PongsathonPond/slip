@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@section('content')

    <div class="container-fluid mt--6">
        <div class="row">

            <div class="col-xl-6 order-xl-2">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'โหลดข้อมูลล่าสุด',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    </script>
                @endif
                <div class="card ">
                    <div class="card-header">
                        <h3>รายการ</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr align="center">

                                    <th scope="col" class="sort" data-sort="name">รายการ</th>
                                    <th scope="col" class="sort" data-sort="status">Qtd</th>

                                    <th scope="col">ราคา</th>

                                </tr>
                            </thead>
                            <tbody class="list">


                                @foreach ($cartItems as $item)
                                    <form action="{{ route('addlist') }}" method="post">
                                        @csrf
                                        <tr class="ss" align="center">

                                            <td> <input type="text" class="form-control" name='listall[]'
                                                    value=" {{ $item->name }}" readonly>
                                            </td>
                                            <td>
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="text" class="form-control" name="sum" style="width: 50px ;"
                                                    value="{{ $item->quantity }}                                                                                                                                                                       
                                                                                                                                                                                                                                                                                                                                                                                                                                                     "
                                                    readonly />



                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='cash[]'
                                                    value="  {{ $item->price }}" readonly style="width: 50% ">
                                            </td>


                                        </tr>

                            </tbody>


                            @endforeach

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="names">ชื่อ</label>
                                            <input type="text" class="form-control" name="names">
                                        </div>
                                    </div>

                                    <div class=" col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="lastname">นามสกุล
                                            </label>
                                            <input type="text" class="form-control" name="lastname">
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="number">รหัสนักศึกษา
                                            </label>
                                            <input type="text" class="form-control" name="number">
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="total" value="{{ Cart::getTotal() }}">
                            <input type="submit" value="เพิ่ม" class="btn btn-success " style="margin-left: 5%">
                            </form>
                            <br> <br>
                        </table>
                        <br>

                        <div>
                            <button type="button" class="btn btn-primary" style="margin-left: 5%">ราคารวม:
                                {{ Cart::getTotal() }} บาท </button>

                            <br>
                            <br>
                            <form action="{{ route('clear') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" style="margin-left: 5%">ล้างข้อมูลทั้งหมด</button>


                            </form>
                        </div>




                    </div>
                </div>
            </div>

            <div class="col-xl-6 order-xl-1">
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

                                    <th scope="col">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="list">


                                @foreach ($products as $product)

                                    <tr class="ss" align="center">

                                        <td>{{ $product->product }}</td>
                                        <td>${{ $product->cash }}</td>
                                        <td>
                                            <form action="{{ route('store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->product }}" name="name">
                                                <input type="hidden" value="{{ $product->cash }}" name="price">
                                                <input type="hidden" value="1" name="quantity">

                                                <button class="btn btn-success">Add To Cart</button>
                                            </form>

                                        </td>


                                    </tr>

                            </tbody>
                            @endforeach

                        </table>


                    </div>

                </div>

            </div>
        </div>
    </div>



@endsection
