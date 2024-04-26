let list = document.querySelector('.lazy-img .list');
let items = document.querySelectorAll('.lazy-img .list .item');
let dots = document.querySelectorAll('.lazy-img .dots li');
let prev = document.querySelector('#prev');
let next = document.querySelector('#next');

let active = 0;
let lengthItems = items.length - 1;



next.addEventListener('click', ()=>{
   if(active + 1 > lengthItems){
      active = 0;
   }else{
      active += 1;
   }
   reloadSilider()
})

prev.addEventListener('click', ()=>{
   if(active - 1 < 0){
      active = lengthItems;
   }else{
      active -= 1;
   }
   reloadSilider()
})

let refreshSlider = setInterval(()=>{
   next.click()
}, 3000);

function reloadSilider(){
   clearInterval(refreshSlider);
   let checkLeft = items[active].offsetLeft;
   list.style.left = -checkLeft + 'px';

   let lastActiveDot = document.querySelector('.lazy-img .dots li.active');
   lastActiveDot.classList.remove('active');
   dots[active].classList.add('active');
   refreshSlider = setInterval(()=>{next.click()}, 3000);
}

dots.forEach((li, key)=>{
   li.addEventListener('click', ()=>{
      active = key;
      reloadSilider();
   })
})