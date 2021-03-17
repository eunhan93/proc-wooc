// redirection url 변경 
document.querySelectorAll('.tml-login input[name=redirect_to]').forEach(el => el.setAttribute('value', `${window.location.origin}/wordpress`));


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