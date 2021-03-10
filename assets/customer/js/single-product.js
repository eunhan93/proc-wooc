
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



q_btn.addEventListener('click', function(e){
  e.preventDefault();

  let create_form = document.createElement('form');

  create_form.action = window.location.origin + '/wordpress/checkout/';
  create_form.method = 'get';

  create_form.innerHTML += `<input type="hidden" name="add-to-cart" value=${value_check()} />`
  create_form.innerHTML += `<input type="hidden" name="quantity" value=${document.getElementById('quantity').value} />`


  document.body.append(create_form);

  create_form.submit();
})


// q_btn.addEventListener('click', function(e){
//   e.preventDefault();
//   window.location = window.location.origin + `/wordpress/checkout/?add-to-cart=${value_check()}&qauntity=${document.getElementById('quantity').value}`

 
// })
