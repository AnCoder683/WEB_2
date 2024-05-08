<?php include './genaral/header.php'; ?>
<?php include './Genaral/general.php'; ?>
<link rel="stylesheet" href="./CSS/MainCSS/body.css">
<header class="header">
   <div class="left-section">
      <ul class="nav">
         <li>Nam</li>
         <li>Nữ</li>
         <li>Collection</li>
      </ul>
      <div class="nav2">
         <i class="fa-solid fa-list"></i>
      </div>
   </div>

   <div class="mid-section">
      <a href="./Main.php">
         <img src="./logo/logo-white-1_png.webp" alt="">
      </a>
   </div>

   <div class="right-section">
      <div class="header-conten-right">
         <div class="search-box">
            <input placeholder="Search" type="text">
            <i class="fa-solid fa-magnifying-glass"></i>
         </div>
         <div class="user-wrapper">
            <i class="fa-solid fa-user user"></i>
            <div class="user-selection" style="display: none;">
               <?php
                  $ss = new Session();
                  if($ss->exist('username')){
                     require './log.php';
                  }else{
                     require './unlog.php';
                  }
               ?>
            </div>
            <i class="fa-solid fa-cart-shopping">
               <div class="user-cart" style="display: none;">
                  <table class="cart-table">
                     <tr>
                        <th class="scope">Sản phẩm</th>
                        <th class="scope">Tên sản phẩm</th>
                        <th class="scope">Số lượng</th>
                        <th class="scope">Giá</th>
                        <th class="scope">Xoá</th>
                     </tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </table>
               </div>
            </i>
         </div>
      </div>
</header>

<div class="slider">
   <div class="lazy-img">
      <div class="list">
         <div class="item">
            <img src="img/pexels-iriser-1379636.jpg" alt="">
         </div>

         <div class="item">
            <img src="img/pexels-iriser-2781760.jpg" alt="">
         </div>

         <div class="item">
            <img src="img/pexels-sohi-807598.jpg" alt="">
         </div>

         <div class="item">
            <img src="img/pexels-souvenirpixels-417074.jpg" alt="">
         </div>

      </div>
      <!-- button -->
      <div class="buttons">
         <button id="prev">
            < <button id="next">>
         </button>
      </div>
      <!-- dot -->
      <ul class="dots">
         <li class="active"></li>
         <li></li>
         <li></li>
         <li></li>
      </ul>
   </div>
</div>

<div class="body">
   <div class="wrapper" id="wrapper">
      <div class="block-title">
         <strong>Đồ nam nổi bật</strong>
      </div>
      <div class="slick-list nam">
         <div class="slick-item">
            <img src="./img/ao2.jpg" alt="">
            <p class="item-name">Áo Sơ Mi Tay Dài Nam Trơn Form Fitted - 10F22SHL042C</p>
            <div class="item-price">
               <span class="sale-price">149.000đ</span>
               <span class="item-old-price">350.000</span>
               <span class="sale-percent">
                  <span>-57%</span>
               </span>
            </div>
            <div class="item-color">
               <div class="colors"><img src="./img/nau.png" alt=""></div>
               <div class="colors"><img src="./img/den.jpg" alt=""></div>
            </div>

         </div>

         <div class="slick-item">
            <img src="./img/ao1.jpg     " alt="">
            <p class="item-name">Áo Polo Nam Premium Tay Ngắn Sọc Gân Form Fitted - 10S24POL001P</p>
            <div class="item-price">
               <span class="sale-price">689.000đ</span>
               <span class="item-old-price">310.000</span>
               <span class="sale-percent">
                  <span>-57%</span>
               </span>
            </div>
            <div class="item-color">
               <div class="colors"><img src="./img/nau.png" alt=""></div>
               <div class="colors"><img src="./img/trang.jpg" alt=""></div>
            </div>

         </div>

         <div class="slick-item">
            <img src="./img/ao3.jpg     " alt="">
            <p class="item-name">Áo Sơ Mi Nam Tay Dài Trơn Ôm Form Fitted - 10F21SHL003CR2</p>
            <div class="item-price">
               <span class="sale-price">2349.000đ</span>
               <span class="item-old-price">1.110.000</span>
               <span class="sale-percent">
                  <span>-58%</span>
               </span>
            </div>
            <div class="item-color">
               <div class="colors"><img src="./img/ao3.jpg" alt=""></div>
            </div>

         </div>

         <div class="slick-item">
            <img src="./img/ao4.jpg     " alt="">
            <p class="item-name">Áo Sơ Mi Nam Tay Dài Nút Ẩn Trơn Form Fitted - 10F21SHL003CR1</p>
            <div class="item-price">
               <span class="sale-price">689.000đ</span>
               <span class="item-old-price">310.000</span>
               <span class="sale-percent">
                  <span>-57%</span>
               </span>
            </div>
            <div class="item-color">
            </div>

         </div>
      </div>
      <div class="more">
         <button>Xem thêm</button>
      </div>

      <div class="block-title">
         <strong>Đồ nữ nổi bật</strong>
      </div>
      <div class="slick-list nu">
         <div class="slick-item">
            <img src="./img/ao2.jpg     " alt="">
            <p class="item-name">Áo Sơ Mi Tay Dài Nam Trơn Form Fitted - 10F22SHL042C</p>
            <div class="item-price">
               <span class="sale-price">149.000đ</span>
               <span class="item-old-price">350.000</span>
               <span class="sale-percent">
                  <span>-57%</span>
               </span>
            </div>
            <div class="item-color">
               <div class="colors"><img src="./img/nau.png" alt=""></div>
               <div class="colors"><img src="./img/den.jpg" alt=""></div>
            </div>
         </div>

         <div class="slick-item">
            <img src="./img/ao1.jpg     " alt="">
            <p class="item-name">Áo Polo Nam Premium Tay Ngắn Sọc Gân Form Fitted - 10S24POL001P</p>
            <div class="item-price">
               <span class="sale-price">689.000đ</span>
               <span class="item-old-price">310.000</span>
               <span class="sale-percent">
                  <span>-57%</span>
               </span>
            </div>
            <div class="item-color">
               <div class="colors"><img src="./img/nau.png" alt=""></div>
               <div class="colors"><img src="./img/trang.jpg" alt=""></div>
            </div>
         </div>

         <div class="slick-item">
            <img src="./img/ao3.jpg     " alt="">
            <p class="item-name">Áo Sơ Mi Nam Tay Dài Trơn Ôm Form Fitted - 10F21SHL003CR2</p>
            <div class="item-price">
               <span class="sale-price">2349.000đ</span>
               <span class="item-old-price">1.110.000</span>
               <span class="sale-percent">
                  <span>-58%</span>
               </span>
            </div>
            <div class="item-color">
               <div class="colors"><img src="./img/ao3.jpg" alt=""></div>
            </div>
         </div>

         <div class="slick-item">
            <img src="./img/ao4.jpg     " alt="">
            <p class="item-name">Áo Sơ Mi Nam Tay Dài Nút Ẩn Trơn Form Fitted - 10F21SHL003CR1</p>
            <div class="item-price">
               <span class="sale-price">689.000đ</span>
               <span class="item-old-price">310.000</span>
               <span class="sale-percent">
                  <span>-57%</span>
               </span>
            </div>
            <div class="item-color">
            </div>
         </div>
      </div>
      <div class="more">
         <button>Xem thêm</button>
      </div>
   </div>

   <?php
      if(isset($_GET['page'])){
         if($_GET['page'] == 'Information'){
            require 'Information.php';
         }elseif($_GET['page'] == 'Bill'){
            require 'Bill.php';
         }

      }
   ?>
</div>
<script src="./js/LazyImg.js"></script>
<script src="./js//Main.js"></script>
<?php require './genaral/footer.php'; ?>
<?php require './Genaral/alert.php'; ?>