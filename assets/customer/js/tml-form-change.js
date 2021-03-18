
// 폼 서브밋 전 url 변경 => 아이디 입력시에 체크?


// form submit 했을 때 실행 => 엔터를 두번 쳐야 실행됨...

// let change_redirect_url = (e) => {
//   e.preventDefault();

//   fetch('http://localhost/wordpress/mb_check/',{
//     method: "POST",
//   headers: {
//     "Content-Type": "application/json",
//   },
//     body: JSON.stringify({
//       userId: e.target.firstElementChild.lastElementChild.value,
//     }),
//   })
//   .then(data => data.json())
//   .then(res => {
//     if(res.user_role === 'administrator' && window.location.search.indexOf('wp-admin') >= 0){
//       document.querySelectorAll('.tml-login input[name=redirect_to]').forEach(el => el.setAttribute('value', `${window.location.origin}/wordpress/wp-admin`));
//     } else {
//       document.querySelectorAll('.tml-login input[name=redirect_to]').forEach(el => el.setAttribute('value', `${window.location.origin}/wordpress`));
//     }

//     document.querySelectorAll('.login-form-area form[name=login]').forEach(el => {el.removeEventListener('submit', change_redirect_url)});
//   });
// }

// document.querySelectorAll('.login-form-area form[name=login]').forEach(el => el.addEventListener('submit', change_redirect_url));


// id 입력할 때 실행

// 기본값
document.querySelectorAll('.tml-login input[name=redirect_to]').forEach(el => el.setAttribute('value', `${window.location.origin}/wordpress`));

let change_redirect_url = (e) => {
  // console.log(e.target.value);
  fetch('http://localhost/wordpress/mb_check/',{
    method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
    body: JSON.stringify({
      userId: e.target.value,
    }),
  })
  .then(data => data.json())
  .then(res => {
    // console.log(res)
    if(res.user_role === 'administrator' && window.location.search.indexOf('wp-admin') >= 0){
      document.querySelectorAll('.tml-login input[name=redirect_to]').forEach(el => el.setAttribute('value', `${window.location.origin}/wordpress/wp-admin`));
    } 
    // else {
    //   document.querySelectorAll('.tml-login input[name=redirect_to]').forEach(el => el.setAttribute('value', `${window.location.origin}/wordpress`));
    // }
  });
}

document.querySelectorAll('.login-form-area form[name=login] input#user_login').forEach(el => el.addEventListener('keyup', change_redirect_url));




// 아이디, 패스워드 input에 placeholder 추가

document.querySelectorAll('#user_login').forEach(el=> el.setAttribute('placeholder', '아이디'))
document.querySelectorAll('#user_pass').forEach(el=> el.setAttribute('placeholder', '비밀번호'))


// 계정 기억하기 -> 로그인 유지하기
document.querySelectorAll('.tml-login label[for=rememberme]').forEach(el => el.innerHTML = '로그인 유지하기');

// remeberme label 추가

document.querySelectorAll('.tml-rememberme-wrap').forEach(el => {
    let rmm_label = document.createElement('label');
    rmm_label.setAttribute('for', 'rememberme');
    rmm_label.setAttribute('class', 'rmm_cb_label');
    el.insertBefore(rmm_label, el.lastElementChild);
    
    let goIdPw = document.createElement('a');
    goIdPw.href = window.location.orgin + '/wordpress/lostpassword'
    goIdPw.innerText = '아이디/비밀번호 찾기';
    el.append(goIdPw);
})


// document.querySelectorAll('.login-area .tml-rememberme-wrap').forEach(el => {
//     let rmm_label = document.createElement('label');
//     rmm_label.setAttribute('for', 'rememberme');
//     rmm_label.setAttribute('class', 'rmm_cb_label');
//     el.append(rmm_label);
// })

// document.querySelectorAll('section.login-popup .tml-rememberme-wrap').forEach(el => {
//     let rmm_label = document.createElement('label');
//     rmm_label.setAttribute('for', 'rememberme');
//     rmm_label.setAttribute('class', 'rmm_cb_label rmm_cb_label_pop');
//     el.append(rmm_label);
// })



document.querySelectorAll('.tml-register-link').forEach(el => {
    el.firstElementChild.innerText = "회원가입"
    let explSpan = document.createElement('span')
    explSpan.innerHTML = '회원이 아니신가요?';
    el.insertBefore(explSpan, el.firstElementChild);
})