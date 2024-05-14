<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Admin Dashboard</h4>
    </div>

    <div class="px-5">

        <div class="row mt-5">
            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-danger  d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-money-bills text-white fs-4"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Đơn Hàng</p>
                                <h5 class="fw-bold">
                                    29
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-success  d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-dollar-sign text-white fs-4"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Doanh Thu</p>
                                <h5 class="fw-bold">
                                101.231.000 đ</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-primary  d-flex align-items-center justify-content-center">
                            <i class="fa-brands fa-slack text-white fs-4"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Sản Phẩm</p>
                                <h5 class="fw-bold">1.149</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-warning d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-calendar-days fs-4 text-white"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Báo Cáo</p>
                                <h5 class="fw-bold">12</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="p-4 shadown-sm border rounded-2">
                <p class="fs-5 fw-bold mb-4">Đơn Hàng Cần Xác Nhận</p>

                <table class="table table-striped">
                    <thead>
                        <th>Khách Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Giỏ Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </thead>

                    <tbody>
                        <tr ng-repeat="order in waitingOrders">
                            <td>{{ order.name }}</td>
                            <td>{{ order.createdAt | date: "HH:mm:ss dd-MM-yyyy" }}</td>
                            <td>
                                {{ order.items.length }} Sản Phẩm
                                <span type="button" class="fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#dh-{{ order._id }}">
                                </span>
                            </td>
                            <td>
                                <span class="badge text-bg-primary" ng-if="order.status === 'Chờ Xác Nhận'">Chờ
                                    Xác
                                    Nhận</span>
                                <span class="badge text-bg-secondary" ng-if="order.status === 'Đã Xác Nhận'">Đã
                                    Xác
                                    Nhận</span>
                                <span class="badge text-bg-info" ng-if="order.status === 'Đang Vận Chuyển'">Đang
                                    Giao</span>
                                <span class="badge text-bg-success" ng-if="order.status === 'Đã Giao'">Đã
                                    Giao</span>
                                <span class="badge text-bg-danger" ng-if="order.status === 'Đã Hủy'">Đã
                                    Hủy</span>
                            </td>
                            <td>
                                <a href="#!order/detail/{{ order._id }}" class="btn btn-danger">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a ng-click="changeStatus(order)" class="btn btn-primary">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                            </td>
                        </tr>


                        <tr ng-if="waitingOrders.length == 0">
                            <td colspan="5" class="text-center">Bạn không có đơn hàng cần xác nhận</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="5">
                                <a href="#!order">Xem tất cả đơn hàng <i class="fa-solid fa-arrow-right"></i></a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-md-7 shadow-sm border rounded-2">
                <div class="chart-header d-flex align-items-center justify-content-between p-4">
                    <p class="fs-5 fw-bold">Biểu Đồ Doanh Thu</p>

                    <select ng-model="selectedMonth" ng-change="updateChartData()" class="form-control w-25">
                        <option value="">Tất cả</option>
                        <option ng-repeat="month in months" value="{{month}}">Tháng {{month}}</option>
                    </select>
                </div>
                <canvas id="myChart"></canvas>

            </div>

            <div class="col-12 col-md-5">
                <div class="p-4 shadow-sm border rounded-2">
                    <div class="bloc-title">
                        <p class="fw-bold fs-5">Khách Hàng Mới</p>
                    </div>

                    <div>
                        <div class="card mb-3">
                            <div class="row g-0 px-4 py-2">
                                <div class="col-md-2 d-flex align-items-center justify-content-between">
                                    <img src="./src/assets/img/avatar.jpg"
                                        class="img-fluid rounded-circle w-100 m-auto h-auto" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">Đặng Thị Thanh Huyền</h5>
                                            <p class="mb-0 text-secondary fs-6">Truy Cập 25 Phút Trước</p>
                                        </div>

                                        <a href="" class="badge text-bg-primary">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="row g-0 px-4 py-2">
                                <div class="col-md-2 d-flex align-items-center justify-content-between">
                                    <img src="./src/assets/img/avatar.jpg"
                                        class="img-fluid rounded-circle w-100 m-auto h-auto" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">Trần Công Minh</h5>
                                            <p class="mb-0 text-secondary fs-6">Đang Trực Tuyến</p>
                                        </div>

                                        <a href="" class="badge text-bg-primary">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="shadow-sm border rounded-2 p-4">
                <p class="mb-0 fw-bold fs-5 mb-4">Bài Viết Mới Nhất</p>

                <table class="table table-striped">
                    <thead>
                        <th>Tiêu Đề</th>
                        <th>Tác Giả</th>
                        <th>Ngày Đăng</th>
                        <th>Thao Tác</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>CHÀO BẠN MỚI - APP TOKYOLIFE TẶNG MIỄN PHÍ MẶT NẠ SỦI BỌT DƯỠNG DA TOKYOLIFE
                            </td>
                            <td>Admin</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>TokyoLife được vinh danh “Giải thưởng Hành động vì Cộng đồng”
                            </td>
                            <td>Trần Công Minh</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>HAPPY 8/3 TẶNG MIỄN PHÍ NƯỚC HOA PHÁP DÀNH RIÊNG THÀNH VIÊN APP</td>
                            <td>Admin</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>TÍCH CỰC ĐÀO TẠO NGHỀ GẮN VỚI GIẢI QUYẾT VIỆC LÀM NGƯỜI KHUYẾT TẬT
                            </td>
                            <td>Trần Công Minh</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>CHÀO BẠN MỚI - APP TOKYOLIFE TẶNG MIỄN PHÍ MẶT NẠ SỦI BỌT DƯỠNG DA TOKYOLIFE
                            </td>
                            <td>Admin</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>