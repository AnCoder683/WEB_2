<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Người Dùng Mới</h5>
    </div>

    <div class="px-5">
        <div class="row mt-5">
            <div class="col-9">
                <div class="p-5 shadow-sm border">
                    
                    <form id="addAccountForm" method="POST" class="row">
                        <div class="col-12 mb-4">
                            <label for="role" class="form-label">Loại tài khoản</label>
                            <select name="role" id="role" class="form-select">
                                <option value="admin">Quản Trị Viên</option>
                                <option value="user">Tài Khoản Khách Hàng</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="username" class="form-label">Tài khoản <span class="text-danger">*</span></label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="password" class="form-label">Mật Khẩu <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control"
                                ng-model="password">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="confirmPassword" class="form-label">Nhập Lại Mật Khẩu <span
                                    class="text-danger">*</span></label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="name" class="form-label">Họ Và Tên <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" ng-model="name">
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="phone" class="form-label">Số Điện Thoại </label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="email" class="form-label">email </label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-12 col-md-6 mb-4"></div>
                        <div class="col-12 mb-4">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" id="addressDetail" class="form-control">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="quyen" class="form-label">Uỷ Quyền</label>
                            <select name="quyen" class="form-select">
                                <?php 
                                    foreach($listquyen as $key2 => $value2) { 
                                        if($value2['muc_uu_tien'] > $level) {
                                ?>
                                            <option value="<?= $value2['idQuyen']?>"><?= $value2['quyen']?></option>
                                <?php   
                                        }
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-12 mb-4">
                            <input name="themtaikhoan" type="submit" class="btn btn-danger"  value="Thêm tài khoản">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("username").addEventListener("input", function(event) {
    var username = event.target.value;
    if (containsVietnamese(username)) {
        event.target.value = removeVietnamese(username);
    }
    });

function containsVietnamese(str) {
    return /[^\x00-\x7F]+/.test(str);
}

function removeVietnamese(str) {
    return str.replace(/[^\x00-\x7F]+/g, '');
}
</script>