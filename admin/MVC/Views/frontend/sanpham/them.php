<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Sản Phẩm Mới</h5>
    </div>
    <div class="px-5">
        <form method="POST" id="themsanphamform" class="row my-5" enctype="multipart/form-data" method="POST">
            <div class="col-12 col-md-6 mb-4">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="category">Loại Sản Phẩm</label>
                <select name="category" name="category" id="category" class="form-select">
                    <option value="">Chọn Loại Sản Phẩm</option>
                    <?php 
                        $dataLoaiSp = isset($datalsp) ? $datalsp : [];
                        foreach ($dataLoaiSp as $key => $value) {
                    ?>
                            <option value="<?= $value["idLoaiSanPham"]?>"><?= $value["tenLoai"]?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="price">Giá </label>
                <input type="number" class="form-control" name="price" id="price">
            </div>

            <div class="col-12 mb-4">
                <label for="images" class="form-label">Ảnh</label>
                <input type="file" class="form-control" name="images" id="images">
            </div>
            <div id="image-preview"></div>
            <div class="col-12 mb-4">
                <label for="tinhtrang" class="form-label">Tình trạng</label>
                <select name="tinhtrang">
                    <option value="0">Kích hoạt</option>
                    <option value="1">Ẩn</option>
                </select>
            </div>
            <div class="mt-5" id="variants-container">
                <!-- Variants will be appended here -->
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-danger" id="add-variant-btn">
                    Thêm chi tiết
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="col-12 mb-4">
                <label for="description">Mô Tả</label>
                <textarea name="description" name="description" id="description" cols="30" rows="4"
                    class="form-control"> </textarea>
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-danger" type="submit" >Thêm Sản Phẩm</button>
            </div>
        </form>
    </div>
</div>
<script>
            let variantIndex = 1;
            function addVariant() {
                const variantHtml = `
                    <div class="row mb-4 variant-row" data-index="${variantIndex}">
                        <p class="text-decoration-underline">Chi tiết sản phẩm</p>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="mau${variantIndex}">Màu</label>
                            <select name="variants[${variantIndex}][mau]" id="mau${variantIndex}" class="form-select">
                            <option value="">Chọn Màu</option>
                            <?php 
                                $datamau = isset($datamau) ? $datamau : [];
                                foreach ($datamau as $key => $value) {
                            ?>
                            <option value="<?= $value["idMau"]?>"><?= $value["tenMau"]?></option>
                            <?php 
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="size${variantIndex}">Size</label>
                            <select name="variants[${variantIndex}][size]" id="size${variantIndex}" class="form-select">
                            <option value="">Chọn Size</option>
                            <?php 
                                $datasize = isset($datasize) ? $datasize : [];
                                foreach ($datasize as $key => $value) {
                            ?>
                            <option value="<?= $value["idSize"]?>"><?= $value["tenSize"]?></option>
                            <?php 
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-12 mb-4">
                            <label for="image${variantIndex}" class="form-label">Ảnh chi tiết</label>
                            <input type="file" class="form-control" id="images${variantIndex} name="variants${variantIndex}images">
                        </div>
                        <div id="image-preview${variantIndex}"></div>
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-danger remove-variant-btn">Xóa</button>
                        </div>
                        
                    </div>
                `;
                $('#variants-container').append(variantHtml);
                variantIndex++;
                console.log(variantIndex);
            }
            // Add initial variant row
            addVariant();

            // Handle add variant button click
            $('#add-variant-btn').click(function(e) {
                e.preventDefault();
                addVariant();
            });
            $(document).on('click', '.remove-variant-btn', function(e) {
                e.preventDefault();
                $(this).closest('.variant-row').remove();
            });
            $('#images').on('change', function() {
                $('#image-preview').empty(); // Xóa hình ảnh đã preview trước đó
                const files = this.files;
                if (files) {
                    $.each(files, function(index, file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#image-preview').append(
                                '<div class="col-3 mb-4"><img src="' + e.target.result + '" class="img-thumbnail" alt="Hình ảnh sản phẩm"></div>'
                            );
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });
            $(document).on('change', 'input[type="file"]', function() {
                var inputId = $(this).attr('id');
                var previewId = '#image-preview' + inputId.match(/\d+/); // Lấy số từ id của input
                
                $(previewId).empty(); // Xóa hình ảnh đã preview trước đó

                var files = this.files;
                if (files) {
                    $.each(files, function(index, file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $(previewId).append(
                                '<div class="col-3 mb-4"><img src="' + e.target.result + '" class="img-thumbnail" alt="Hình ảnh sản phẩm"></div>'
                            );
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });

            $("#themsanphamform").submit(function (event){
                event.preventDefault();
                if(validationSanpham() === false) {
                    return;
                }
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: 'POST',
                    url: BASE_URL+'/sanpham/addhandle', // Đường dẫn tới trang quản trị
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        response = JSON.parse(response);
                        if (response["result"] === true) {
                            alert(response["message"]);
                            showAlert(response["message"],'success');
                        } else {
                            showAlert(response["message"],'danger');
                        }
                    },
                });
            });

            function validationSanpham() 
            {
                $('.error').remove();

                var isValid = true;

                // Validate Tên Sản Phẩm
                var name = $('#name').val().trim();
                if (name === '') {
                    isValid = false;
                    $('#name').after('<span class="error" style="color:red;">Tên sản phẩm không được để trống</span>');
                }

                // Validate Loại Sản Phẩm
                var category = $('#category').val();
                if (category === '') {
                    isValid = false;
                    $('#category').after('<span class="error" style="color:red;">Loại sản phẩm không được để trống</span>');
                }

                // Validate Giá
                var price = $('#price').val().trim();
                if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
                    isValid = false;
                    $('#price').after('<span class="error" style="color:red;">Giá sản phẩm phải là số dương</span>');
                }

                // Validate Ảnh
                var images = $('#images').val();
                if (images === '') {
                    isValid = false;
                    $('#images').after('<span class="error" style="color:red;">Ảnh sản phẩm không được để trống</span>');
                }

                // Validate Tình trạng
                var tinhtrang = $('#tinhtrang').val();
                if (tinhtrang === '') {
                    isValid = false;
                    $('#tinhtrang').after('<span class="error" style="color:red;">Tình trạng không được để trống</span>');
                }

                // Validate Mô Tả
                var description = $('#description').val().trim();
                if (description === '') {
                    isValid = false;
                    $('#description').after('<span class="error" style="color:red;">Mô tả không được để trống</span>');
                }

                // If form is valid, submit the form
                return isValid;
            }
    </script>