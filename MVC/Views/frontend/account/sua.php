<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Chỉnh Sửa Thông Tin</h5>
    </div>
    <div class="px-5">
        <div class="row mt-5">
            <div class="col-3 pe-5">
                <div
                    class="p-2 pb-5 d-flex flex-column align-items-center justify-content-between border shadow-sm rounded-3">
                </div>
            </div>
            <div class="col-9">
                <div class="p-5 shadow-sm border">
                    <?php foreach($data as $key => $value) {?>
                    <form id="suaForm" onsubmit="suaAccount(event ,<?= $value['tenDangNhap']?>)" class="row" method="POST">
                        <div class="col-12 col-md-6 mb-4">
                            <label for="name" class="form-label">Họ Và Tên</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $value['tenNhanVien']?>">
                        </div>
                        
                        <div class="col-12 col-md-6 mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $value['email']?>">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="mobile" class="form-label">Số Điện Thoại </label>
                            <input type="text" name="mobile" id="mobile" class="form-control" value="<?= $value['SDT']?>">
                        </div>
                        <div class="col-12 col-md-6 mb-4"></div>

                        <div class="col-12 mb-4">
                            <label for="addressDetail" class="form-label">Địa chỉ</label>
                            <input type="text" name="addressDetail" id="addressDetail" class="form-control">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="role" class="form-label">Uỷ Quyền</label>
                            <select name="role" id="role" class="form-select">
                                <?php foreach($listquyen as $key2 => $value2) { 
                                    if($value2['muc_uu_tien'] > $level) {
                                        if($value['idQuyen'] == $value2['idQuyen']) {?>
                                            <option value="<?= $value2['idQuyen']?>" selected><?= $value2['quyen']?></option>
                                <?php   } else{
                                            echo "<option value=".$value2['idQuyen'].">".$value2['quyen']."</option>";
                                        }
                                    }
                                }?>
                            </select>
                        </div>
                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-danger">Lưu Thay Đổi</button>
                            <a href="#!/user" class="btn btn-secondary">Hủy</a>
                        </div>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>