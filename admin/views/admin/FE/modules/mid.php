<div class="mid">
    <!-- <?php 
        include('leftmenu/leftmenu.php')
    ?> -->
    <div class="content">
        <?php 
            if(isset($_GET['action']) && $_GET['query']){
                $temp = $_GET['action'];
                $query = $_GET['query'];
            }
            else{
                $temp = '';
                $query = '';
            }
            if($temp == 'quanlydanhmucsanpham' && $query=='them'){
                include("quanlydanhmucsp/them.php");
                include("quanlydanhmucsp/lietke.php");
            }
            elseif($temp == 'quanlydanhmucsanpham' && $query=='sua'){
                include("quanlydanhmucsp/sua.php");
            }
            elseif($temp == 'quanlysanpham'  && $query=='them'){
                include("quanlysanpham/them.php");
                include("quanlysanpham/lietke.php");
            }
            elseif($temp == 'quanlysanpham'  && $query=='sua'){
                include("quanlysanpham/sua.php");
            }
            elseif($temp == 'chitietsanpham'  && $query=='lietke'){
                include("chitietsanpham/them.php");
                include("chitietsanpham/chitiet.php");
            }
            elseif($temp == 'chitietsanpham'  && $query=='sua'){
                include("chitietsanpham/sua.php");
            }
            elseif($temp == 'quanlytaikhoan' && $query=='them'){
                include("quanlytaikhoan/them.php");
                include("quanlytaikhoan/lietke.php");
            }
            else{
                include("dashboard.php");
            }
        ?>
    </div>
</div>
<script>
    var content = document.querySelector('.content');
        // Thêm sự kiện mouseenter vào menu
    content.addEventListener('mouseenter', function() {
        // Bật cuộn trình diễn cho content khi chuột nằm trên content
        content.style.overflowY = 'auto';
    });

    // Thêm sự kiện mouseleave vào content
    content.addEventListener('mouseleave', function() {
        // Tắt cuộn trình diễn cho content khi chuột rời khỏi content
        content.style.overflowY = 'hidden';
    });
</script>