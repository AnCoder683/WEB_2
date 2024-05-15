<style>
    .rating input[type="radio"] {
        display: none;
    }

    .rating label.fa-solid.fa-star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }

    .rating input[type="radio"]:checked~label.fa-solid.fa-star {
        color: #ffc107;
    }
</style>
    
    <div class="container mt-5">
        <nav style="
            --bs-breadcrumb-divider: url(
              &#34;data:image/svg + xml,
              %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='%236c757d'/%3E%3C/svg%3E&#34;
            );
          " aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="http://localhost/abc/Sanpham/showSanPham" class="text-decoration-none text-dark text-light">Trang Chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none text-dark text-light">{{ product.category.title }}</a>
                </li>
                <li class="breadcrumb-item active text-danger fw-medium" aria-current="page">
                    {{ product.title }}
                </li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-xl-6 col-sm-12">
                <div class="d-flex">
                    <div class="img-small d-flex flex-column gap-3 me-3">
                        <img ng-repeat="image in product.images" src="<?php echo BASE_ASSETS ?>/img copy/product/<?php echo $dataChiTietSanPham['imgPath']?>.webp" class="img-fluid cursor-pointer"
                            width="200px" />
                    </div>

                    <div class="img-larger">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/product/<?php echo $dataChiTietSanPham['imgPath']?>.webp" class="img-fluid" id="img-larger" />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-12 ps-5 d-flex flex-column gap-4">

                <div class="d-flex flex-column gap-1">
                    <h4 class="text-start fw-bold mb-0"><?php echo $dataSanPham['tenSanPham']?></h4>

                    <div class="star-group text-warning">
                        <span ng-if="product.totalRating === 0">Chưa có đánh giá</span>

                        <i class="fa-solid fa-star"
                            ng-repeat="i in [].constructor(product.totalRating) track by $index"></i>
                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center pb-3 custom-dash">
                    <div class="d-flex align-items-center justify-content-start gap-3">
                        <!-- <p class="mb-0 fw-bold fs-4 text-danger">199.000đ</p>
                        <p class="mb-0 fw-light text-decoration-line-through">
                            224.000đ
                        </p> -->

                        <p class="mb-0 fw-bold fs-4 text-danger">
                            <?php echo $dataSanPham['giaSanPham']?>đ
                        </p>
                        <p class="mb-0 fw-light text-decoration-line-through" ng-if="product.sale > 0">
                            100000đ
                        </p>
                        <span class="badge text-bg-danger" ng-if="product.sale > 0">
                            20  %
                        </span>
                    </div>

                    <div class="icon-check">
                        <span class="fw-medium">Còn Hàng</span>
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-check.svg" alt />
                    </div>
                </div>

                <div>
                    <label for="selectedVariant" class="form-label">Chọn màu:</label>
                    <select 
                        style="
                            display: inline-block;
                        "
                        class="form-control w-25" ng-model="selectedVariant"
                        ng-options="variant._id as (variant.color + ' - ' + variant.size ) for variant in product.variants">

                        
                    </select>
                    <label for="selectedVariant" class="form-label">Chọn Size:</label>
                    
                    <select
                        style="
                            display: inline-block;
                        "
                        class="form-control w-25" ng-model="selectedVariant"
                        ng-options="variant._id as (variant.color + ' - ' + variant.size ) for variant in product.variants">
                    </select>

                    
                    <div ng-show="selectedVariant">
                        <p class="mb-0 mt-3">Số lượng: <?php echo $dataChiTietSanPham['soLuong']?></p>
                    </div>
                </div>

                <div class="group-quantity">
                    <div class="d-flex flex-column gap-2">
                        <span class="fs-6 fw-bold d-block">Số Lượng</span>
                        <div class="d-flex">
                            <div class="custom-btn-quantity" ng-click="changeQuantity('decrease')">-</div>
                            <input type="number" name="quantity" id="quantity" class="custom-input-quantity text-center"
                                ng-model="quantity">
                            <div class="custom-btn-quantity" ng-click="changeQuantity('increase')">+</div>
                        </div>
                    </div>
                </div>


                <div class="size-guide">
                    <span type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-lc.svg" />
                        Hướng Dẫn Chọn Kích Thước
                    </span>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <img src="./src/assets/img/product/size_guide.webp" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group-btn d-flex gap-4">
                    <div class="btn btn-outline-danger rounded-1 w-100 py-2" ng-class="{'disabled': !isLogin}"
                        ng-click="addToWishlist(product._id)">
                        <i class="fa-solid fa-heart"></i>
                        Yêu Thích
                    </div>


                    <div class="btn btn-danger rounded-1 w-100 py-2" ng-click="addToCart(product)">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-cart-plus.svg" />
                        Thêm Vào Giỏ Hàng
                    </div>
                </div>

                <div class="btn btn-outline-dark w-100 py-2">
                    <i class="fa-solid fa-location"></i>
                    Tìm Cửa Hàng Có Sản Phẩm
                </div>

                <div
                    class="group-delivery d-flex align-items-center justify-content-between gap-4 text-center pt-3 border-top border-dark-subtle">
                    <div class="d-flex flex-column gap-2 align-items-center justify-content-center">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-delivery.svg" class="img-fluid">
                        <span>
                            Miễn phí vận chuyển với đơn hàng từ 500K
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-2 align-items-center justify-content-center">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-circle-arrow.svg" class="img-fluid">
                        <span>
                            1 đổi 1 trong vòng 7 ngày
                        </span>
                    </div>
                    <div class="d-flex flex-column gap-2 align-items-center justify-content-center">
                        <img src="<?php echo BASE_ASSETS ?>/img copy/icon/icon-delivery.svg" class="img-fluid">
                        <span>
                            Kiếm tra hàng trước khi thanh toán
                        </span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Mô Tả Sản Phẩm
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ product.description }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Đánh Giá Từ Khách Hàng
                        </button>
                    </h2>

                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body" ng-show="product.totalRating === 0">
                            <div class="py-3 d-flex flex-column gap-3 align-items-center justify-content-center">
                                <img src="<?php echo BASE_ASSETS ?>/img copy/icon/EmtyReview.86be870e.svg" class="img-fluid d-block">
                                <p class="mb-0 fw-medium fs-6">Sản Phẩm Này Chưa Có Đánh Giá</p>
                            </div>
                        </div>

                        <div class="accordion-body" ng-show="product.totalRating > 0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Người Đánh Giá</th>
                                        <th scope="col">Đánh Giá</th>
                                        <th scope="col">Bình Luận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="review in product.rating">
                                        <td>{{ review.postedBy.name }}</td>
                                        <td>
                                            <div class="star-group
                                                text-warning">
                                                <i class="fa-solid fa-star"
                                                    ng-repeat="i in [].constructor(review.star) track by $index"></i>
                                            </div>
                                        </td>
                                        <td>{{ review.comment }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="accordion-body" ng-show="isLogin">
                            <form ng-submit="addReview()" class="d-flex flex-column gap-2 border p-5">
                                <div class="d-flex mb-3">
                                    <div class="rating">
                                        <input type="radio" id="star5" name="rating" ng-value="5" ng-model="rating">
                                        <label for="star5" title="5 sao" class="fa-solid fa-star fs-3"></label>

                                        <input type="radio" id="star4" name="rating" ng-value="4" ng-model="rating">
                                        <label for="star4" title="4 sao" class="fa-solid fa-star fs-3"></label>

                                        <input type="radio" id="star3" name="rating" ng-value="3" ng-model="rating">
                                        <label for="star3" title="3 sao" class="fa-solid fa-star fs-3"></label>

                                        <input type="radio" id="star2" name="rating" ng-value="2" ng-model="rating">
                                        <label for="star2" title="2 sao" class="fa-solid fa-star fs-3"></label>

                                        <input type="radio" id="star1" name="rating" ng-value="1" ng-model="rating">
                                        <label for="star1" title="1 sao" class="fa-solid fa-star fs-3"></label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Đánh Giá</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        ng-model="content"></textarea>
                                </div>

                                <button type="submit" class="btn btn-danger">Gửi Đánh Giá</button>
                            </form>

                        </div>

                        <div class="accordion-body text-center" ng-if="!isLogin">
                            <a href="#!login" class="btn btn-danger px-5">Bạn Cần Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>