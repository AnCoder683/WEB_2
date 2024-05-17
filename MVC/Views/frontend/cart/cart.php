    <div class="cart-top mt-5 d-flex align-items-center justify-content-center flex-wrap gap-5">
        <div class="d-flex align-items-center gap-2">
            <img src="<?php echo BASE_ASSETS?>/img copy/icon/icon-bag.svg" class="img-fluid">
            <span class="fs-4 fw-bold text-danger">Giỏ Hàng</span>
        </div>

        <i class="fa-solid fa-arrow-right"></i>

        <div class="d-flex align-items-center gap-2">
            <img src="<?php echo BASE_ASSETS?>/img copy/icon/icon-bag-2.svg" class="img-fluid">
            <span class="fs-5 fw-light">Đặt Hàng</span>
        </div>

        <i class="fa-solid fa-arrow-right"></i>

        <div class="d-flex align-items-center gap-2">
            <img src="<?php echo BASE_ASSETS?>/img copy/icon/icon-bag-3.svg" class="img-fluid">
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
                            <?php $total = 0; $stt = 0; $totalCart = 0; foreach($dataChiTietSanPham as $value){?>
                                
                            <tr ng-repeat="item in cart" class="position-relative">
                                <td><?php echo ++$stt;?></td>
                                <td>
                                    <img src="<?php echo $value['img']?>" width="50px">
                                </td>
                                <td>
                                    <h6><?php echo $value['tenSanPham']?></h6>
                                    <p>
                                        Kích thước: <?php echo $value['tenSize']?>
                                        <br>
                                        Màu sắc: <?php echo $value['tenMau']?>
                                    </p>
                                </td>
                                <td class="gia-js"><?php echo number_format($value['giaSanPham'])?>đ</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="custom-btn-quantity" ng-click="changeQuantity('decrease', $index)">
                                            <i class="fa-solid fa-minus"></i>
                                        </div>
                                        <input value="<?php echo $value['soLuongHangMua']?>" type="number" name="quantity" id="quantity"
                                            class="custom-input-quantity text-center" ng-model="cart[$index].quantity">
                                        <div class="custom-btn-quantity" ng-click="changeQuantity('increase', $index)">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="thanhtien-js">
                                    <?php $subtotal = $value['soLuongHangMua'] * $value['giaSanPham'];
                                    $total += $subtotal;
                                    echo number_format($subtotal) . 'đ';?>đ
                                </td>
                                <td class="position-absolute bottom-0 end-0 translate-middle cursor-pointer"
                                    ng-click="removeProduct($index)">
                                    <i data-id-chi-tiet-san-pham="<?php echo $value['idChiTietSanPham']?>" data-id-gio-hang="<?php echo $value['idGioHang']?>" class="fa-solid fa-trash remove-js"></i>
                                </td>
                            </tr>   

                            <?php $totalCart++;}?>
                            

                        </tbody>
                    </table>

                    <button data-id-gio-hang="<?php echo ($dataChiTietSanPham[0]['idGioHang'])?>" class="w-100 btn btn-outline-danger delAll-js" ng-click="removeAllProduct()">Xoá Hết Giỏ Hàng</button>
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
                            <h5  class="mb-0 text-danger fw-bold total-js" ng-if="totalPrice"><?php echo number_format($total) ?>đ
                            </h5>
                        </div>
                    </div>

                    <button class="w-100 btn btn-danger checkout-js" href="">Thanh Toán</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            document.querySelector('.checkout-js').addEventListener('click', ()=>{
                let idkhachhang = document.querySelector('.cart-js').dataset.idkhachhang;
                let totalCart = `<?php echo $totalCart;?>`;
                if(totalCart > 0){
                    $.post("http://localhost/BEW/cart/checkout", {
                            idKhachHang: idkhachhang
                        }, (data)=>{
                            $('.body').html(data);
                        })
                }else{
                    alert('Không có sản phẩm nào');

                }
                })  
        });


         $(document).ready(function(){
            document.querySelectorAll('.remove-js').forEach(button => {
                let idChiTietSanPham =  button.dataset.idChiTietSanPham;
                let idGioHang = button.dataset.idGioHang;
                let idKhachHang = document.querySelector('.cart-js').dataset.idkhachhang;
                button.addEventListener('click', ()=>{
                    console.log(idChiTietSanPham);
                    console.log(idKhachHang);
                    console.log(idGioHang);
                    $.post("http://localhost/BEW/cart/showCart", {
                    removeIdChiTietSanPhamFromCart: idChiTietSanPham,
                    idKhachHang: idKhachHang,
                    idGioHang: idGioHang
                    }, (data)=>{
                        $('.body').html(data);
                    })
                })
            });
        });

        $(document).ready(function(){
            document.querySelector('.delAll-js').addEventListener('click', ()=>{
                let idKhachHang = document.querySelector('.cart-js').dataset.idkhachhang;
                let idGioHang = document.querySelector('.delAll-js').dataset.idGioHang;
                
                // alert(idGioHang);
                $.post("http://localhost/BEW/cart/showCart", {
                    removeAll: idGioHang,
                    idKhachHang: idKhachHang
                    }, (data)=>{
                        $('.body').html(data);
                    })
            })
        });
        
        
    </script>