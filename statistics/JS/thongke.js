start_up();
function start_up()
{

 creat_canva1() ;  
 creat_canva2() ;
 creat_canva3() ;  
 creat_canva_main();
 getData();
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* PHP ajax*/
const path ='http://localhost/web_2/statistics/c/Thongke_Controller.php';

function getData() {
    try {
        var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log("Dữ liệu đã được nhận thành công.");
                // Hiển thị dữ liệu người dùng
                document.getElementById("doanhthu-div").innerHTML = JSON.parse(xhr.responseText).DoanhthuData + ".VND";
                // Hiển thị dữ liệu hệ thống
                document.getElementById("doanhthu-tile-div").innerHTML = JSON.parse(xhr.responseText).Doanhthutyle;
            } else {
                console.error("Đã xảy ra lỗi:", xhr.status);
                // Xử lý lỗi nếu có
            }
        }
    };
    xhr.open("POST", 'http://localhost/web_2/statistics/c/Thongke_Controller.php' , true); // Địa chỉ URL của tập tin xử lý dữ liệu
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var currentDate = new Date();
    var currentMonth = currentDate.getMonth() + 1;
    xhr.send("functionName=load_info_butt"+"&data=" + currentMonth);//xhttp.send("functionName=" + functionName + "&data=" + data);
    
    } catch (error) {
        alert (error);
    }
    
}
async function fetchData() {
    try {
       
            const response = await fetch('http://localhost/WEB_2/statistics/c/Chart_month_controller.php');
            const data = await response.json();
            return data;
        }
            
        
    
   
     catch (error) {
        alert (error);
    }
    
}
async function fetchData_30day() {
    try {
       
            const response = await fetch('http://localhost/WEB_2/statistics/c/chart_day_controler.php');
            const data = await response.json();
            return data;
        }
            
        
    
   
     catch (error) {
        alert (error);
    }
    
}










//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*java*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 let key1 =true;
 let key2 =true;
 let key3 =true;
 let key4 =true;
var divElement = document.getElementById('doanhthubut');
                          divElement.addEventListener('click', function() 
                          { 
                            if (key1==1){
                                chart_clear()
                                happy_chart();
                                 //topseller_chart();
                                // out_stock_chart();
                                 month_chart();
                                 khoa_k();
                                 key1=0;
                            }
                            
                           })
                 
var divElement1 = document.getElementById('content-2-click');
                          divElement1.addEventListener('click',  function() 
                          {  if (key2)
                            {
                                chart_clear();
                                khoa_k();
                                key2=false;
                            }
                            
                            

                            })
  
function khoa_k()
{
    key1=true;key2=true;key3=true;key4=true;key5=true;
}
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////       


 
 async function happy_chart()
    {
        try {   
            const data = await fetchData();
           
           var ctx = document.getElementById('myhappyChart').getContext('2d');
           var myChart = new Chart(ctx, {
               type: 'bar',
               data: {
                   labels: data.labels,
                   datasets: [{
                       label: 'Doanh thu 12 tháng',
                       data: data.values,
                       backgroundColor: 'rgba(75, 192, 192, 0.2)',
                       borderColor: 'rgba(75, 192, 192, 1)',
                       borderWidth: 1
                   }]
               },
               options: {
                   scales: {
                       y: {
                           beginAtZero: true
                       }
                   }
               }
           });
            
        } catch (error) {
            alert (error);
        }
 // Lấy thẻ canvas
 
    }
   


    function topseller_chart()
    {
 // Lấy thẻ canvas
 var ctx = document.getElementById('top-seller-Chart').getContext('2d');
      
// Khởi tạo biểu đồ
var myChart = new Chart(ctx, {
    type: 'pie', // Loại biểu đồ (ví dụ: cột, đường, hình tròn, vv)
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'], // Nhãn trục x
        datasets: [{
            label: 'Doanh thu', // Nhãn của dữ liệu
            data: [12, 19, 3, 5, 2, 3], // Dữ liệu
            backgroundColor: [ // Màu nền cho từng cột
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [ // Màu viền cho từng cột
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // Độ rộng của viền
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Bắt đầu từ 0 trên trục y
            }
        }
    }
});
    }



    function out_stock_chart()
    {
 // Lấy thẻ canvas
 var ctx = document.getElementById('out-stock-Chart').getContext('2d');

// Khởi tạo biểu đồ
var myChart = new Chart(ctx, {
    type: 'pie', // Loại biểu đồ (ví dụ: cột, đường, hình tròn, vv)
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'], // Nhãn trục x
        datasets: [{
            label: 'Doanh thu', // Nhãn của dữ liệu
            data: [12, 19, 3, 5, 2, 3], // Dữ liệu
            backgroundColor: [ // Màu nền cho từng cột
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [ // Màu viền cho từng cột
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // Độ rộng của viền
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Bắt đầu từ 0 trên trục y
            }
        }
    }
});
    }

    async  function month_chart()
    { 
        try
        {
        const data = await fetchData_30day();

var ctx = document.getElementById('month_stock').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data.labels,
        datasets: [{
            label: 'Dữ liệu theo ngày',
            data: data.values,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
var element = document.getElementById("month_stock");

// Đặt chiều rộng và chiều cao mới
element.style.width = "100%";  // Thay 200px bằng giá trị mong muốn
element.style.height = "100%";
element.style.display = "block";
element.style.marginLeft = "auto";
element.style.marginRight = "auto";
        
    } catch (error) {
        alert (error);
    }
 // Lấy thẻ canvas
 

    }
    function chart_clear()
    {  
        try {
        const canvas1 = document.getElementById('myhappyChart')
       const ctx1 = canvas1.getContext('2d');
       ctx1.clearRect(0, 0, canvas1.width, canvas1.height);
       canvas1.parentNode.removeChild(canvas1);
       creat_canva1();

       const canvas2 = document.getElementById('top-seller-Chart')
       const ctx2 = canvas2.getContext('2d');
       ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
       canvas2.parentNode.removeChild(canvas2);
       creat_canva2();

       const canvas3 = document.getElementById('out-stock-Chart')
       const ctx3 = canvas3.getContext('2d');
       ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
       canvas3.parentNode.removeChild(canvas3);
       creat_canva3();
    
       const canvas_main = document.getElementById('month_stock')
       const ctx_main = canvas_main.getContext('2d');
       ctx_main.clearRect(0, 0, canvas_main.width, canvas3.height);
       canvas_main.parentNode.removeChild(canvas_main);
       creat_canva_main();
       
        } catch (error) {
        alert (error);
        
        }
       
    } 
    function creat_canva1()
    {   const newCanvas = document.createElement('canvas');
        newCanvas.id = 'myhappyChart';
        const parentElement = document.getElementById('canva1');
        parentElement.appendChild(newCanvas);
    }
    function creat_canva2()
    {   const newCanvas = document.createElement('canvas');
        newCanvas.id = 'top-seller-Chart';
        const parentElement = document.getElementById('canva2');
        parentElement.appendChild(newCanvas);
    }
    function creat_canva3()
    {   const newCanvas = document.createElement('canvas');
        newCanvas.id = 'out-stock-Chart';
        const parentElement = document.getElementById('canva3');
        parentElement.appendChild(newCanvas);
    }
    function creat_canva_main()
    {   const newCanvas = document.createElement('canvas');
        newCanvas.id = 'month_stock';
        newCanvas.classList.add('month_stock_class');
    
        const parentElement = document.getElementById('month_canva');
        parentElement.appendChild(newCanvas);
        

    }
    
