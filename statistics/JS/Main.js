document.querySelector('.user').addEventListener('click', ()=>{
   const html = `<div class="user-selection">
                     <a href="./Login.php">đăng nhập</a>
                     <a href="./Signup.php">đăng ký</a>
               </div>`
   let userWrapper = document.querySelector('.user-wrapper')
   const userSelection = document.querySelector('.user-selection')
   if(userSelection){
      userSelection.remove();
   }else {
      userWrapper.insertAdjacentHTML('beforeend', html);
   }
})