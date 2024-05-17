var per_page = 3;
function loadPage(page) {
    // Tính totalPages và gọi createPagination trong callback
    getTotalPages(function(totalPages) {
        $.ajax({
            url: BASE_URL+'/sanpham/pagination',
            type: 'GET',
            data: {page: page},
            dataType: 'json',
            success: function(response) {
                // Xử lý dữ liệu trả về và cập nhật giao diện người dùng
                $('#productTable tbody').empty();
                cnt = (parseInt(page) - 1)*per_page;
                $.each(response, function(index, product) {
                    if(product.tt_xoa == 1) {
                        tinhtrang = "Kích hoạt";
                    } else {
                        tinhtrang = "Ẩn";
                    }
                    $('#productTable tbody').append(
                        '<tr><td>' 
                        + ++cnt + '</td><td>' 
                        + product.idSanPham + '</td>'
                        + '<td>' + product.tenSanPham + '</td>'
                        + '<td>' + product.moTa + '</td>'
                        + '<td>' + product.giaSanPham + '</td>'
                        + '<td>' + product.soLuongTrongKho + '</td>'
                        + '<td>' + product.tenLoai + '</td>'
                        + '<td><img src="'+ BASE_ASSETS +'/img/uploads/'+product.img+'" alt="Hình ảnh sản phẩm" width="80" height="120"></td>'
                        + '<td>' + tinhtrang + '</td>'
                        + '<td>' +
                            // <a href="?action=quanlysanpham&query=sua?id=<?= $value['idSanPham']?>">
                            // Sửa</a> |
                            // <a href="FE/modules/quanlysanpham/xuly.php?query=xoa?id=<?= $value['idSanPham']?>">
                            // Xóa
                            // </a> |
                            '<a class="btn btn-info" href="'+BASE_URL+'/sanpham/showFormSua/'+product.idSanPham+'">Sửa</a> |'
                            +
                            '<a class="btn btn-primary" href="'+BASE_URL+'/chitietsanpham/chitiet/'+product.idSanPham+'">Chi tiết</a> |'
                            +
                            '<a class="btn btn-danger btnDelete">Xóa</a>'
                        + '</td>'
                        +
                        '</tr>')
                        ;
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}
// Hàm để tính totalPages và gọi createPagination
function getTotalPages(callback) {
    $.ajax({
        url: BASE_URL+'/'+currentpage+'/totalPage',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var totalPages = response.totalPages;
            // Gọi callback với totalPages
            callback(totalPages);
            createPagination(totalPages);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
function createPagination(totalPages) {
    var pagination = $('.pagination');
    pagination.empty();
    for (var i = 1; i <= totalPages; i++) {
        var li = $('<li class="page-item"><a class="page-link" href="#">' + i + '</a></li>');
        // Thêm sự kiện click cho mỗi nút phân trang
        li.find('a').click(function(e) {
            e.preventDefault();
            var page = $(this).text();
            loadPage(page);
        });
        pagination.append(li);
    }
}
$(document).ready(function() {
    // Gọi hàm loadPage để tải trang đầu tiên khi trang được tải
    loadPage(1);
});

