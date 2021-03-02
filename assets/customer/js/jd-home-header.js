const jdFixHeader = document.querySelector('.jd-fix-menu');

window.addEventListener('scroll', function(){
  if(this.scrollY >= 100){
    jdFixHeader.classList.add('fix-top');
  } else {
    jdFixHeader.classList.remove('fix-top');
  }
})