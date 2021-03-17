
const m_btn = document.querySelector('.qty-minus')
const p_btn = document.querySelector('.qty-plus')
const q_btn = document.querySelector('.quickBuyBtn')
// const q_btn = document.querySelector('.quickBuyBtn')

if(Number(document.getElementById('quantity').value) <= 1){
  m_btn.style.color = "lightgray";
}


const minusBtn = () => {
  if(Number(document.getElementById('quantity').value) >= 2){
    // document.getElementById('quantity').value = Number(document.getElementById('quantity').value) - 1;
    document.getElementById('quantity').setAttribute('value', Number(document.getElementById('quantity').value) - 1);
  }
  if(Number(document.getElementById('quantity').value) <= 1){
    m_btn.style.color = "lightgray";
  } else {
    m_btn.style.color = "#111";
  }
}

const plusBtn = () => {
  if(Number(document.getElementById('quantity').value) < 10){
    // document.getElementById('quantity').value = Number(document.getElementById('quantity').value) + 1;
    document.getElementById('quantity').setAttribute('value', Number(document.getElementById('quantity').value) + 1);
  }
  if(Number(document.getElementById('quantity').value) <= 1){
    m_btn.style.color = "lightgray";
  } else {
    m_btn.style.color = "#111";
  }
}


m_btn.addEventListener('click', minusBtn);
p_btn.addEventListener('click', plusBtn);

function value_check() {
  var check_count = document.getElementsByName("add-to-cart").length;

  for (var i=0; i<check_count; i++) {
      if (document.getElementsByName("add-to-cart")[i].checked == true) {
          return document.getElementsByName("add-to-cart")[i].value;
      }
  }
}



// q_btn.addEventListener('click', function(e){
//   e.preventDefault();

//   let create_form = document.createElement('form');

//   create_form.action = window.location.origin + '/wordpress/checkout/';
//   create_form.method = 'get';

//   create_form.innerHTML += `<input type="hidden" name="add-to-cart" value=${value_check()} />`
//   create_form.innerHTML += `<input type="hidden" name="quantity" value=${document.getElementById('quantity').value} />`


//   document.body.append(create_form);

//   create_form.submit();
// })


// q_btn.addEventListener('click', function(e){
//   e.preventDefault();
//   window.location = window.location.origin + `/wordpress/checkout/?add-to-cart=${value_check()}&qauntity=${document.getElementById('quantity').value}`

 
// })


q_btn.addEventListener('click', function(e){
  e.preventDefault();
  let _postId = Array.from(document.body.classList);
  let p_id = '';
  _postId.forEach((el) => {
    if(el.indexOf('postid-') >= 0){
      p_id = el.replace('postid-', '');
    }
  })
  // let postId = document.body.classList;

  let add_time = String(Math.floor(+ new Date() / 1000));
  // console.log(add_time)

  // 장바구니에 추가    postid-317
  fetch(`${window.location.origin}/wordpress/?add-to-cart=${value_check()}&qauntity=${document.getElementById('quantity').value}`)
  .then(() => {
    // console.log(Math.floor(+ new Date() / 1000));
    if(value_check() !== ''){
      fetch(`${window.location.origin}/wordpress/for-buy-now/?product_id=${p_id}&variation_id=${value_check()}&quantity=${document.getElementById('quantity').value}&add_time=${add_time}`)
      .then(data =>{
        console.log(data); 
        return data.json()
      })
      .then(res => {
        
        setTimeout(() => window.location = `${window.location.origin}/wordpress/checkout/?item=${res.key}`, 200)
        
      });
    } else {
      fetch(`${window.location.origin}/wordpress/for-buy-now/?product_id=${p_id}&qauntity=${document.getElementById('quantity').value}&add_time=${add_time}`)
      .then(data => data.json())
      .then(res => {
        setTimeout(() => window.location = `${window.location.origin}/wordpress/checkout/?item=${res.key}`, 200)
        // window.location = `${window.location.origin}/wordpress/checkout/?buy_now_item=${res.key}`
      });
    }
  })


  // .then(res => {
  //   console.log(res)
  // })

  // 우선 폼을 서브밋해줘야하나?
  // 아니면 ajax 형식을 사용해야하는가
})