<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Sản Phẩm Mới</h5>
    </div>
    <div class="px-5">
        <form method="POST" id="suasanphamform" class="row my-5" enctype="multipart/form-data" method="POST">
            <?php foreach($data as $key => $valuesp) { ?>
                <input type="hidden" name="idSanPham" value="<?= $valuesp['idSanPham']?>">
            <div class="col-12 col-md-6 mb-4">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $valuesp['tenSanPham']?>">
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for="category">Loại Sản Phẩm</label>
                <select name="category" name="category" id="category" class="form-select">
                    <option value="">Chọn Loại Sản Phẩm</option>
                    <?php 
                        $dataLoaiSp = isset($datalsp) ? $datalsp : [];
                        foreach ($dataLoaiSp as $key => $value) {
                            if($valuesp['idLoaiSanPham'] === $value['idLoaiSanPham']) {
                    ?>
                            <option value="<?= $value["idLoaiSanPham"]?>" selected><?= $value["tenLoai"]?></option>
                    <?php 
                            } else {
                                ?>
                            <option value="<?= $value["idLoaiSanPham"]?>"><?= $value["tenLoai"]?></option>
                    <?php 
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for="price">Giá </label>
                <input type="number" class="form-control" name="price" id="price" value="<?= $valuesp['giaSanPham']?>">
            </div>

            <div class="col-12 mb-4">
                <label for="images" class="form-label">Ảnh</label>
                <input type="file" class="form-control" name="images" id="images">
            </div>
            <div id="image-preview"><img width="200" height="300" src="<?= BASE_ASSETS?>/img/uploads/<?= $valuesp['img']?>" alt=""></div>
            <div class="col-12 mb-4">
                <label for="tinhtrang" class="form-label">Tình trạng</label>
                <select name="tinhtrang">
                    <?php if($valuesp['tt_xoa'] === 1) {
                        echo '<option value="1" select>Kích hoạt</option>
                        <option value="0">Ẩn</option>'; 
                    } else {
                        echo '<option value="1">Kích hoạt</option>
                        <option value="0" select>Ẩn</option>'; 
                    }
                    ?>
                    
                </select>
            </div>
            <div class="col-12 mb-4">
                <label for="description">Mô Tả</label>
                <textarea name="description" name="description" id="description" cols="30" rows="4"
                    class="form-control"><?= $valuesp['moTa']?></textarea>
            </div>
            <?php }?>
            <div class="col-12 mb-4">
                <button class="btn btn-danger" type="submit" >Sửa Sản Phẩm</button>
            </div>
        </form>
    </div>
</div>

<script>
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
        
            $("#suasanphamform").submit(function (event){
                event.preventDefault();
                if(validationSanpham() === false) {
                    return;
                }
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: 'POST',
                    url: BASE_URL+'/sanpham/edithandle', // Đường dẫn tới trang quản trị
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

                // // Validate Loại Sản Phẩm
                // var category = $('#category').val();
                // if (category === '') {
                //     isValid = false;
                //     showAlert("Vui lòng chọn loại sản phẩm", "danger");
                // }

                // Validate Giá
                var price = $('#price').val().trim();
                if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
                    isValid = false;
                    $('#price').after('<span class="error" style="color:red;">Giá sản phẩm phải là số dương</span>');
                }

                // If form is valid, submit the form
                return isValid;
            }
</script>