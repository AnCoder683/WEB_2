<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Phiếu Nhập Mới</h5>
    </div>

    <div class="content">
    <div class="px-5">

        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?= BASE_URL?>/phieunhap/danhsach" class="btn btn-danger">Về trang quản lý phiếu nhập
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="fw-bold mt-3">Thông tin chi tiết phiếu nhập</div>
        <form id="idFormNhapHang" action="#" method="POST ">
        <div class="col-12 col-md-6 mb-4">
                <label for="nhacungcap">Nhà cung cấp</label>
                <select name="nhacungcap" name="nhacungcap" id="nhacungcap" class="form-select">
                    <option value="">Chọn nhà cung cấp</option>
                    <?php 
                        $datancc = isset($datancc) ? $datancc : [];
                        foreach ($datancc as $key => $value) {
                    ?>
                            <option value="<?= $value["idNhaCungCap"]?>"><?= $value["tenNhaCungCap"]?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
             <!-- Table Header -->
            <table class="mt-2 table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Màu</th>
                        <th scope="col">Size</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Giá Nhập</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
            <tbody id="productTableBody">
                <!-- Products will be dynamically added here -->
            </tbody>
    </table>
        <p class="fw-bold">Tổng tiền nhập hàng:</p>
        <div class="fw-bold text-danger" id="tongTienNhap" name="tongTienNhap">0</div>
        <p>Phí vận chuyển</p>
        <input type="number" onchange="tinhThanhTien()" id="phiVanChuyen" name="phiVanChuyen" value="0">
        <p>Thành tiền</p>
        <input type="text" id="thanhTien" name="thanhTien" value="0" readonly>
        <hr>
        <button type="submit" class="btn btn-primary">Tạo phiếu nhập</button>
        </form>
        <button id="toggleTableButton" class="mt-5 btn btn-info" onclick="toggleTable()">Hiển thị bảng sản phẩm</button>
        <div>
            <form class="mt-3" action="">
               <p class="fw-bold">Nhập tên sản phẩm cẩn tìm: <input type="text" name="tensanpham" id=""></p>
            </form>
        </div>
        
        <table id="hiensanphamnhaphang" class="mt-2 table table-striped" width="50%" style="border-collapse: collapse;">
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Màu</th>
                <th>Size</th>
                <th>Hình ảnh</th>
                <th>Giá nhập</th>
                <th>Số lượng</th>
                <th>Thêm vào phiếu nhập</th>
            </tr>
            <?php
                $i = 0;
                foreach($data as $key => $value) {
                    $i++;
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $value['idChiTietSanPham']?></td>
                <td><?= $value['tenSanPham']?></td>
                <td><?= $value['giaSanPham']?></td>
                <td><?= $value['tenLoai']?></td>
                <td><?= $value['tenMau']?></td>
                <td><?= $value['tenSize']?></td>
                <td class="img-column"><img src="<?= BASE_ASSETS?>/img/uploads/<?= $value['img']?>" 
                alt="Ảnh sản phẩm" width="100" height="100"></td>
                <td><input class="w-75" type="number" value="<?= $value['giaNhap']?>"></td>
                <td><input class="w-50" type="number" value="0"></td>
                <td><button class="btn btn-primary">Thêm</button></td>
            </tr>
            <?php
                }
            ?>
        </table>
        
    </div>
</div>
   
</div>
<script>
    function tinhThanhTien() {
        var phiVanChuyen = parseFloat(document.getElementById('idPhiVanChuyen').value);
        var tongTienNhap = parseFloat(document.getElementById('tongTienNhap').value);
        var thanhTien =phiVanChuyen +tongTienNhap;
        var thanhTienInput = document.getElementById('thanhTien');
        thanhTienInput.value = thanhTien;
    }
    function toggleTable() {
    var table = document.getElementById('hiensanphamnhaphang');
    var button = document.getElementById('toggleTableButton');

    if (table.style.display === 'none') {
        table.style.display = 'table'; // Hiện bảng
        button.innerText = 'Ẩn'; // Đổi nút thành "Ẩn"
    } else {
        table.style.display = 'none'; // Ẩn bảng
        button.innerText = 'Hiển thị bảng sản phẩm'; // Đổi nút thành "Hiện"
    }
}
document.addEventListener('DOMContentLoaded', function() {
    var addButton = document.querySelectorAll('#hiensanphamnhaphang .btn-primary');
    addButton.forEach(function(button) {
        button.addEventListener('click', function() {
            var row = this.closest('tr');
            var productId = row.cells[1].innerText;
            var productName = row.cells[2].innerText;
            var productPrice = row.cells[3].innerText;

            var productColor = row.cells[5].innerText;
            var productSize = row.cells[6].innerText;

            var giaNhap = row.cells[8].querySelector('input').value;
            var soLuong = row.cells[9].querySelector('input').value;

            if(!soLuong) {
                showAlert("Vui lòng thêm số lượng", "danger");
                return;
            }
            if(soLuong <= 0) {
                showAlert("Số lượng là một số dương", "danger");
                return;
            }
            if(!giaNhap) {
                showAlert("Giá không hợp lệ ", "danger");
                return;
            }
            if(giaNhap <= 0) {
                showAlert("Là một số dương", "danger");
                return;
            }
            addProductToForm(productId, productName, productPrice, productColor, productSize, giaNhap, soLuong);
        });
    });
});

var productsArray = []; // Mảng dữ liệu sản phẩm
function displayProductTable() {
    var chitiet = 0;
    var tbody = document.querySelector('#productTableBody');
    var idtongtien = document.querySelector('#tongTienNhap');
    tbody.innerHTML = ''; // Xóa hết các hàng hiện tại trong bảng
    idtongtien.innerHTML = '';
    // Duyệt qua mảng productsArray để tạo hoặc cập nhật bảng
    var tongTien = 0.0;
    productsArray.forEach(function(product, index) {
        tongTien += parseFloat(product.giaNhap*product.soLuong);
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <tr data-index=${chitiet}>
            <td >${index + 1}</td>
            <td ><input type="text" name="chitiet[${chitiet}][idChitietsanpham]" readonly value="${product.idChiTietSanPham}"></td>
            <td>${product.name}</td>
            <td>${product.mau}</td>
            <td>${product.size}</td>
            <td><input type="text" name="chitiet[${chitiet}][giaBan]" readonly value="${product.giaBan}"></td>
            <td><input type="number" name="chitiet[${chitiet}][giaNhap]" readonly value="${product.giaNhap}"> </td>
            <td name=soLuong${chitiet}>${product.soLuong}</td>
            <td><button class="btn btn-danger">Xóa</button></td>
            </tr>
        `;
        tbody.appendChild(newRow);
    });
    idtongtien.append(tongTien);
}
function addProductToForm(productId, productName, productPrice, productColor, productSize, giaNhap, soLuong) {
    var form = document.getElementById('idFormNhapHang');
    // Tạo object chứa thông tin sản phẩm
    var productExists = false;
    // Duyệt qua mảng productsArray để kiểm tra sản phẩm đã tồn tại hay chưa
    productsArray.forEach(function(product) {
        if (product.idChiTietSanPham === productId) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng lên
            product.soLuong += parseInt(soLuong);
            // Đặt biến cờ thành true để biết rằng sản phẩm đã tồn tại
            productExists = true;
        }
    });
    // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào mảng
    if (!productExists) {
        var product = {
            idChiTietSanPham: productId,
            name: productName,
            giaBan: productPrice,
            soLuong: parseInt(soLuong),
            mau:productColor,
            size:productSize,
            giaNhap:parseFloat(giaNhap),
        };
        productsArray.push(product);
    }
        // Hiển thị hoặc cập nhật lại bảng
        displayProductTable();
}
$("#idFormNhapHang").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    formData.push({listchitiet: productsArray});
    $.ajax({
        type: 'POST',
        url: BASE_URL+'/phieunhap/themphieunhap', // Đường dẫn tới trang quản trị
        data: formData,
        success: function (response) {
            // Xử lý phản hồi từ server
            response = JSON.parse(response);
            if (response['result'] == true) {
                // Chuyển hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
                showAlert(response['message'], 'success');
            } else {
                showAlert(response['error'],'danger');
            }
        },
    });
});
</script>