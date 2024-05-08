<script>
   document.getElementById('wrapper').style.display = "none";
</script>
<link rel="stylesheet" href="./CSS/MainCSS/bill.css">

<H2 class="title">Xem đơn hàng đã đặt</H2>
<div class="bill-information">
   <div class="bill-wrapper">
      <table class="bill">
         <thead>
            <tr>
               <th class="scope">STT</th>
               <th class="scope">Mã đơn hàng</th>
               <th class="scope">Ngày đặt</th>
               <th class="scope">Chi tiết</th>
               <th class="scope">Thành tiền</th>
            </tr>
         </thead>
         <tbody>
            <td>001</td>
            <td>DN331</td>
            <td>2024-04-03</td>
            <td><button class="detail">Chi tiết đơn hàng</button></td>
            <td>3.000.000</td>
         </tbody>
      </table>
   </div>

   <div class="bill_detail-wrapper">
      <span class="close">x</span>
      <table class="bill-detail">
         <thead>
            <tr>
               <th class="scope">Sản phẩm</th>
               <th class="scope">Tên sản phẩm</th>
               <th class="scope">Size</th>
               <th class="scope">Số lượng</th>
               <th class="scope">Giá</th>
               <th class="scope">Giảm giá</th>
               <th class="scope">Thành tiền</th>
            </tr>
         </thead>
         <tbody>
            <td>hello world</td>
            <td>Áo ngủ</td>
            <td>M</td>
            <td>3</td>
            <td>100.000</td>
            <td>10%</td>
            <td>270.000</td>
         </tbody>
         <tbody>
            <td>xin chào</td>
            <td>quần ngủ</td>
            <td>S</td>
            <td>2</td>
            <td>150.000</td>
            <td>10%</td>
            <td>270.000</td>
         </tbody>
      </table>
   </div>
</div>
<script src="./js//bill.js"></script>