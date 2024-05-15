<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Sửa loại Sản Phẩm</h4>
    </div>
    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="<?php echo BASE_URL?>/loaisanpham/" class="btn btn-danger">DS loại sản phẩm
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <form class="mt-5" id="formSuaLoaiSanPham">
            <table class="table" width="50%" style="border-collapse: collapse;">
                <tr>    
                    <th>Thông tin</th>
                </tr>
                <?php
                    foreach ($data as $key => $value) {
                ?>
                <tr>
                    <td>Id loại sản phẩm: </td>
                    <td><input type="text" name="idLoaiSanPham" value="<?= $value['idLoaiSanPham']?>" readonly></td>
                </tr>
                <tr>
                    
                    <td>Tên loại sản phẩm: </td>
                    <td><input type="text" name="tenLoai" value="<?= $value['tenLoai']?>"></td>
                </tr>
                
                
                <tr>
                    <td>Tình trạng: </td>
                    <td>
                        <?php 
                            if($value['tt_xoa']) {
                        ?>      
                                <select name="tinhtrang">
                                    <option value="1" selected>Kích hoạt</option>
                                    <option value="0">Ẩn</option>
                                </select>
                        <?php
                            }else {
                        ?>     
                                <select name="tinhtrang">
                                    <option value="1" >Kích hoạt</option>
                                    <option value="0" selected>Ẩn</option>
                                </select>
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <input type="hidden" name="action" value="sualoaisanpham">
                <tr>
                    <td></td>
                    <td colspan="2"><button type="submit mt-3" class="btn btn-danger" name="sualoaisanpham">Sửa</button></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </form>
    </div>
</div>