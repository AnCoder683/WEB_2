var BASE_URL = "http://localhost/fashionstoremvc";
function blockAccount(id) {
    $.ajax({
        url: BASE_URL+'/account/blockaccount/'+id, // Đường dẫn đến file xử lý AJAX
        data: $(this).serializeArray(),
        success: function(response) {
            // Xử lý phản hồi từ máy chủ
            var res = JSON.parse(response);
            if(res['result'] == true) {
                showAlert(res['message'], "success");
            } else {
                showAlert(res['message'], "danger");
            }
        },
    });
}
function unlockAccount(id) {
    $.ajax({
        url: BASE_URL+'/account/unlockaccount/'+id, // Đường dẫn đến file xử lý AJAX
        data: $(this).serializeArray(),
        success: function(response) {
            // Xử lý phản hồi từ máy chủ
            var res = JSON.parse(response);
            if(res['result'] == true) {
                showAlert(res['message'], "success");
            } else {
                showAlert(res['message'], "danger");
            }
        },
    });
}
function suaAccount(event, id) {
    event.preventDefault();
    var formData = $('#suaForm').serializeArray();
    $.ajax({
        method: "POST",
        url: BASE_URL+'/account/handle/'+id, // Đường dẫn đến file xử lý AJAX
        data: formData,
        success: function(response) {
            // Xử lý phản hồi từ máy chủ
            var res = JSON.parse(response);
            if(res['result'] == true) {
                showAlert(res['message'], "success");
            } else {
                showAlert(res['message'], "danger");
            }
        },
    });
}

async function validateUsername() {
    var username = document.getElementById("username").value;
    try {
        var response = await $.ajax({
            method: "POST",
            url: BASE_URL+'/account/checkUsername/'+username,
            data: $(this).serializeArray(),
        });
        var res = JSON.parse(response);
        return res['result'];
    } catch (error) {
        // Xử lý lỗi nếu có
        console.error(error);
        return false; // Trả về false nếu xảy ra lỗi
    }
}

async function validationAccount() {
    block = true;
    var name = document.getElementById("name").value;
    if(username === "") {
        showAlert("Vui lòng nhập tên tài khoản", "danger");
        return false;
    }
    var isUsernameValid = await validateUsername();
    if (!isUsernameValid) {
        showAlert("Tên đăng nhập đã tồn tại!", "danger");
        // Trả về false nếu tên đăng nhập không hợp lệ
        return false;
    }
    var password = document.getElementById("password").value;
    if(password === '') {
        showAlert("Mật khẩu không được để trống", "danger");
        return false;
    }
    var confirmPassword = document.getElementById("confirmPassword").value;
    if(password !== confirmPassword) {
        showAlert("Mật khẩu xác nhận và mật khẩu không khớp", "danger");
        return false;
    }
    if(name === "") {
        showAlert("Vui lòng nhập họ tên", "danger");
        return false;
    }
    if(!isUsernameValid) {
        return false;
    }
    var phoneRegex = /^[0-9]+$/;
    var phone = document.getElementById("phone").value;
    if (!phoneRegex.test(phone)) {
        showAlert("Vui lòng nhập SDT hợp lệ", "danger");
        return false;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var email = document.getElementById("email").value;
    if (!emailRegex.test(email)) {
        showAlert("Vui lòng nhập emai hợp lệ", "danger");
        return false;
    }
    // Kiểm tra định dạng số điện thoại
   
    return true;
}
$('#addAccountForm').submit(function(event) {
    event.preventDefault();
    val = validationAccount();
    if(val === false) {
        return;
    }
    $.ajax({
        method: "POST",
        url: BASE_URL+'/account/handle', // Đường dẫn đến file xử lý AJAX
        data: $(this).serializeArray(),
        success: function(response) {
            // Xử lý phản hồi từ máy chủ
            var res = JSON.parse(response);
            if(res['result'] == true) {
                showAlert(res['message'], "success");
            } else {
                showAlert(res['message'], "danger");
            }
        },
    });
});