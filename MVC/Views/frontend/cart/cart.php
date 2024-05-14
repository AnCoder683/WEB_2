<main class="body">
    <div class="cart-top mt-5 d-flex align-items-center justify-content-center flex-wrap gap-5">
        <div class="d-flex align-items-center gap-2">
            <img src="./src/assets/img/icon/icon-bag.svg" class="img-fluid">
            <span class="fs-4 fw-bold text-danger">Giỏ Hàng</span>
        </div>

        <i class="fa-solid fa-arrow-right"></i>

        <div class="d-flex align-items-center gap-2">
            <img src="./src/assets/img/icon/icon-bag-2.svg" class="img-fluid">
            <span class="fs-5 fw-light">Đặt Hàng</span>
        </div>

        <i class="fa-solid fa-arrow-right"></i>

        <div class="d-flex align-items-center gap-2">
            <img src="./src/assets/img/icon/icon-bag-3.svg" class="img-fluid">
            <span class="fs-5 fw-light">Hoàn Thành Đơn Hàng</span>
        </div>
    </div>

    <div class="cart-main container mt-5">
        <div class="row p-0">
            <div class="col-xl-8 col-sm-12 table-responsive">
                <div class="p-3 border shadow-sm row rounded-3">
                    <table class="table table-striped">
                        <thead>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </thead>

                        <tbody>
                            <?php foreach($dataGioHang as $value){?>
                                
                            <tr ng-repeat="item in cart" class="position-relative">
                                <td><?php echo $value['idChiTietGioHang']?></td>
                                <td>
                                    <img src="{{ item.product.images[0] }}" width="50px">
                                </td>
                                <td>
                                    <h6>{{ item.product.title }}</h6>
                                    <p>
                                        Kích thước: {{ item.variant.size }}
                                        <br>
                                        Màu sắc: {{ item.variant.color }}
                                    </p>
                                </td>
                                <td>{{ item.product.price | currency: "": 0 }}đ</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="custom-btn-quantity" ng-click="changeQuantity('decrease', $index)">
                                            <i class="fa-solid fa-minus"></i>
                                        </div>
                                        <input type="number" name="quantity" id="quantity"
                                            class="custom-input-quantity text-center" ng-model="cart[$index].quantity">
                                        <div class="custom-btn-quantity" ng-click="changeQuantity('increase', $index)">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ item.product.price * item.quantity | currency: "": 0 }}đ
                                </td>
                                <td class="position-absolute bottom-0 end-0 translate-middle cursor-pointer"
                                    ng-click="removeProduct($index)">
                                    <i class="fa-solid fa-trash"></i>
                                </td>
                            </tr>   

                            <?php }?>
                            

                        </tbody>
                    </table>

                    <button class="w-100 btn btn-outline-danger" ng-click="removeAllProduct()">Xoá Hết Giỏ Hàng</button>
                </div>
            </div>

            <div class="col-xl-4 col-sm-12 offset-md-0 ">
                <div class="p-3 rounded-3 border shadow-sm d-flex gap-3 flex-column">
                    <h5 class="text-start mt-3">ĐƠN HÀNG</h5>

                    <div class="custom-dash d-flex flex-column gap-2 pb-3">
                        <small class="fw-bold fs-6">Quý Khách Vui Lòng Nhập Mã Phiếu Giảm Giá Ở Bước Kế Tiếp</small>
                    </div>

                    <!-- <div class="custom-dash d-flex flex-column gap-2 pb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-1 fw-medium">Tạm Tính</p>
                            <p class="mb-1 fw-medium" ng-if="totalPrice">{{ totalPrice | currency : "" : 0 }}</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-1 fw-medium">Mã Giảm Giá</p>
                            <p class="mb-1 fw-medium">{{ discount | currency : "" : 0 }}đ</p>
                        </div>
                    </div>
 -->
                    <div class="custom-dash d-flex flex-column gap-2 pb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0 text-danger fw-bold">Tổng Tiền</h5>
                            <h5 class="mb-0 text-danger fw-bold" ng-if="totalPrice">{{ totalPrice | currency: "" : 0 }}đ
                            </h5>
                        </div>
                    </div>

                    <a class="w-100 btn btn-danger" href="#!checkout">Thanh Toán</a>
                </div>
            </div>
        </div>
    </div>
</main>