    <div class="cart-top mt-5 d-flex align-items-center justify-content-center flex-wrap gap-5">
        <a class="d-flex align-items-center gap-2 nav-link" href="#!cart">
            <img src="<?php echo BASE_ASSETS?>/img copy/icon/icon-cart-3.svg" class="img-fluid">
            <span class="fs-5 fw-light">Giỏ Hàng</span>
        </a>

        <i class="fa-solid fa-arrow-right"></i>

        <div class="d-flex align-items-center gap-2">
            <img src="<?php echo BASE_ASSETS?>/img copy/icon/icon-bag-4.svg" class="img-fluid">
            <span class="fs-4 fw-bold text-danger">Đặt Hàng</span>
        </div>

        <i class="fa-solid fa-arrow-right"></i>

        <div class="d-flex align-items-center gap-2">
            <img src="<?php echo BASE_ASSETS?>/img copy/icon/icon-bag-3.svg" class="img-fluid">
            <span class="fs-5 fw-light">Hoàn Thành Đơn Hàng</span>
        </div>
    </div>

    <div class="checkout-main container mt-5">
        <div class="row p-0">
            <div ng-submit=""
                class="col-xl-8 col-sm-12 shadow-sm p-4 rounded-3 border d-flex flex-column gap-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="text-start fw-bold mb-0">Địa Chỉ Giao Hàng</h4>

                    <a class="icon-login d-flex align-items-center gap-1 nav-link" ng-show="!isLogin" href="#!login">
                        <img src="./src/assets/img/icon/icon-user-circle.svg" alt="">
                        <!-- <span class="text-danger">Đăng Nhập</span> -->
                    </a>
                </div>

                <div class="row p-0">
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <label for="name" class="form-label">Họ Và Tên</label>
                        <input value="<?php echo $khachHang['ten']?>" type="text" name="name" id="name" class="form-control " ng-model="userData.name">
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?php echo $khachHang['email']?>" type="email" name="email" id="email" class="form-control email-js" ng-model="userData.email">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input value="<?php echo $khachHang['SDT']?>" type="text" name="phone" id="phone" class="form-control sdt-js" ng-model="userData.mobile">
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <label class="form-label">Chọn tỉnh / thành phố</label>
                        <select ng-model="selectedProvince" ng-options="province.Name for province in locations"
                            class="form-control dc-js">
                            <option disabled selected value="">Chọn một tỉnh/thành phố</option>
                            <option value="TP.HCM">TP.HCM</option>
                            <option value="TP.Hà Nội">TP.Hà Nội</option>
                            <option value="Bình Thuận">Bình Thuận</option>

                        </select>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <label class="form-label">Chọn quận / huyện</label>
                        <select ng-model="selectedDistrict"
                            ng-options="district.Name for district in selectedProvince.Districts" class="form-control dc-js">
                            <option disabled selected value="">Chọn một quận/huyện</option>
                            <option value="Quận 1">Quận 1</option>
                            <option value="Quận 2">Quận 2</option>
                            <option value="Quận 3">Quận 3</option>
                            <option value="Quận 4">Quận 4</option>
                            <option value="Quận 5">Quận 5</option>
                            <option value="Quận 6">Quận 6</option>
                            <option value="Quận 7">Quận 7</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <label class="form-label">Chọn phường / xã</label>
                        <select  ng-model="selectedWard" ng-options="ward.Name for ward in selectedDistrict.Wards"
                            class="form-control dc-js">
                            <option disabled selected value="">Chọn một phường/xã</option>
                            <option value="Phường 1">Phường 1</option>
                            <option value="Phường 2">Phường 2</option>
                            <option value="Phường 3">Phường 3</option>
                    
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="address" class="form-label">Nhập chỉ cụ thể</label>
                        <input value="<?php echo $khachHang['diaChiGiaoHang']?>" type="text" name="addressDetail" id="addressDetail" class="form-control dctextbox-js"
                            ng-model="userData.addressDetail">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="note" class="form-label">Ghi Chú Đơn Hàng</label>
                        <textarea name="note" id="note" cols="10" rows="3" class="form-control"
                            ng-model="note"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5 class="text-left fw-medium mb-0 d-flex align-items-center gap-2 mb-2">
                            <img src="./src/assets/img/icon/icon-payment.svg" alt="">
                            <span>Phương Thức Thanh Toán</span>
                        </h5>

                        <select name="payment" id="payment" class="form-select" ng-model="paymentMethod">
                            <option value="Thanh Toán Khi Nhận Hàng">Thanh Toán Khi Nhận Hàng</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <h5 class="text-left fw-medium mb-0 d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-truck"></i>
                            <span>Phương Thức Vận Chuyển</span>
                        </h5>

                        <select name="transport" id="transport" class="form-select" ng-model="shippingMethod">
                            <option value="Giao Hàng Nhanh">Giao Hàng Nhanh</option>
                            <option value="Giao Hàng Tiết Kiệm">Giao Hàng Tiết Kiệm</option>
                        </select>
                    </div>
                </div>

                <button type="" class="btn btn-danger position-fixed end-0 bottom-0 me-5 mb-5 z-2 btn-lg done-js">
                    Hoàn Thành Đơn Hàng
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>

            <div class="col-xl-4 col-sm-12 ">
                <div class="shadow-sm px-3 rounded-3 border d-flex flex-column gap-3 pt-2 pb-4">
                    <h5 class="text-start mt-3 fw-bold">ĐƠN HÀNG</h5>

                    <div class="custom-dash d-flex flex-column gap-2 pb-3">
                        <!-- <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-1 fw-medium">Tạm Tính</p>
                            <p class="mb-1 fw-medium">{{ tempPrice | currency: "" : 0 }}đ</p>
                        </div> -->

                        <!-- <form class="position-relative" ng-submit="applyCoupon()">
                            <input type="text" name="discount" id="discount" class="form-control" ng-model="couponCode"
                                placeholder="Nhập Mã Giảm Giá">
                            <button class="btn btn-danger btn-md position-absolute top-0 end-0" type="submit">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form> -->

                        <!-- <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-1 fw-medium">Giảm Giá</p>
                            <p class="mb-1 fw-medium">{{ discount | currency: "": 0 }}đ</p>
                        </div> -->

                        <!-- <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-1 fw-medium">Phí Vận Chuyển</p>
                            <p class="mb-1 fw-medium">Miễn Phí</p>
                        </div> -->
                    </div>

                    <div class="custom-dash d-flex flex-column gap-2 pb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0 text-danger fw-bold">Tổng Tiền</h5>
                            <h5 class="mb-0 text-danger fw-bold total-js">{{ totalPrice | currency : "" : 0 }}đ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container shadow-sm border my-5">
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
                <?php $index = 0; $total = 0; foreach($dataAllChiTietSanPham as $value){
                        
                    ?>
                <tr ng-repeat="item in cart" class="position-relative">
                    <td><?php echo ++$index;?></td>
                    <td>
                        <img src="{{ item.product.images[0] }}" width="50px">
                    </td>
                    <td>
                        <h6><?php echo $value['tenSanPham']?></h6>
                        <p>
                            Kích thước: <?php echo $value['tenSize']?>
                            <br>
                            Màu sắc: <?php echo $value['tenMau']?>
                        </p>
                    </td>
                    <td><?php echo number_format($value['giaSanPham'])?>đ</td>
                    <td>
                        <?php echo $value['soLuongHangMua']?>
                    </td>
                    <td>
                        <?php $total += $value['giaSanPham'] * $value['soLuongHangMua']; echo number_format($value['giaSanPham'] * $value['soLuongHangMua'])?>đ
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <script>
            document.querySelector('.total-js').innerHTML = `<?php echo number_format($total)?>đ`;
            

            

            document.querySelector('.done-js').addEventListener('click', ()=>{
                let emailValid = true;
                let allFilled = true;
                let phoneValid = true;

                document.querySelectorAll('.dctextbox-js').forEach(input => {
                    if (input.value.trim() === '' || input.value === null) {
                        input.classList.add('is-invalid'); // Thêm lớp 'is-invalid' vào các trường trống
                        allFilled = false;
                    } else {
                        input.classList.remove('is-invalid'); // Xóa lớp 'is-invalid' nếu trường đã được điền
                    }
                });

                const phoneRegex = /^[0-9]{10,11}$/;
                const phoneInput = document.querySelector('.sdt-js');
                if (!phoneRegex.test(phoneInput.value)) {
                    phoneInput.classList.add('is-invalid'); // Thêm lớp 'is-invalid' vào trường số điện thoại không hợp lệ
                    phoneValid = false;
                } else {
                    phoneInput.classList.remove('is-invalid'); // Xóa lớp 'is-invalid' nếu trường số điện thoại hợp lệ
                }
                document.querySelectorAll('.dc-js').forEach(input => {
                    if (input.value.trim() === '' || input.value === null) {
                        input.classList.add('is-invalid'); // Thêm lớp 'is-invalid' vào các trường trống
                        allFilled = false;
                    } else {
                        input.classList.remove('is-invalid'); // Xóa lớp 'is-invalid' nếu trường đã được điền
                    }
                });

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const emailInput = document.querySelector('.email-js');
                if (!emailRegex.test(emailInput.value)) {
                    emailInput.classList.add('is-invalid'); // Thêm lớp 'is-invalid' vào trường email không hợp lệ
                    emailValid = false;
                } else {
                    emailInput.classList.remove('is-invalid'); // Xóa lớp 'is-invalid' nếu trường email hợp lệ
                }


                document.querySelectorAll('.dc-js').forEach(input=>{
                    if(input.value.trim() === '' || input.value === null){
                        input.classList.add('is-invalid');
                        allFilled = false;
                    }else{
                        input.classList.remove('is-invalid');
                    }
                })

                if (!allFilled) {
                    alert('Vui lòng điền đầy đủ thông tin vào tất cả các trường.');
                } else if (!emailValid) {
                    alert('Vui lòng nhập một địa chỉ email hợp lệ.');
                } else if (!phoneValid) {
                    alert('Vui lòng nhập một số điện thoại hợp lệ.');
                } else {
                    let tongTien = document.querySelector('.total-js').innerHTML
                    let idKhachHang = document.querySelector('.cart-js').dataset.idkhachhang;


                    const today = new Date();

                    const day = String(today.getDate()).padStart(2, '0'); 
                    const month = String(today.getMonth() + 1).padStart(2, '0'); 
                    const year = today.getFullYear(); 
                    const formattedDate = `${year}-${month}-${day}`;
                    
                    alert(formattedDate)
                    $.post("http://localhost/BEW/cart/done", {
                        tongTien: tongTien,
                        idKhachHang: idKhachHang,
                        toDay: formattedDate
                    }, function(data){
                        $('.body').html(data); // Sử dụng đối số data để cập nhật nội dung của phần tử có id là "ketqua"
                    });
                    window.location.reload();
                }
            })
        </script>
    </div>