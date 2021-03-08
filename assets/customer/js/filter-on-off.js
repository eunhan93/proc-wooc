// 윈도우 스크롤 시 맨 위로 고정
// filter 클릭시 토글 클래스 필요 - 버튼, 사이드, 

const itemSortHD = document.querySelector('.item-orderby-header');
const filterBtn = document.querySelector('.filter-btn');
const s_side = document.querySelector('.s-side');
const s_items = document.querySelector('.s-items');
const sortListOnOff = document.querySelector('.order-by-list .selected');
const sortList = document.querySelector('.order-by-list-select');
const sortListArea = document.querySelector('.order-by-list');


// header 고정

window.addEventListener('scroll', function(){
  if(this.scrollY >= 100){
    itemSortHD.classList.add('fix-top');
    s_side.classList.add('fix-top');
  } else {
    itemSortHD.classList.remove('fix-top');
    s_side.classList.remove('fix-top');
  }
})

// window.addEventListener('scroll', function(){
//   if(this.scrollY >= 130){
//     s_side.classList.add('fix-top');
//   } else {
//     s_side.classList.remove('fix-top');
//   }
// })




filterBtn.addEventListener('click', function(){
  this.classList.toggle('off');
  s_side.classList.toggle('off');
  s_items.classList.toggle('off');

  // if(this.classList.contains('off')){
  //   console.log('test')
  // }
})


sortListOnOff.addEventListener('click', function(){
  sortList.classList.add('on')
})
sortList.addEventListener('mouseleave', function(){
  sortList.classList.remove('on')
})



const textArr = Array.from(sortList.children)
textArr.forEach(element => {
  console.log(window.location)
  let location = window.location.href;
  let att = element.getAttribute('href');
  console.log(att);
  if(location === att){
    element.setAttribute('style', 'color:lightgray');
  }
});