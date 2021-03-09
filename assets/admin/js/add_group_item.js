console.log('ㅅㅂ')

const selectInput = document.getElementById('get_the_post_id');
const selectValue = document.getElementById('group-item');
const selected = document.getElementById('addGroupItemBtn');

const addThumbnailArea = document.querySelector('.group_post_id_thumbnail');

function getSelectValues(select) {
  var result = [];
  var options = select && select.options;
  var opt;

  for (var i=0, iLen=options.length; i<iLen; i++) {
    opt = options[i];

    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
  }
  return result;
}

// window.onload = function(){
//   const selectInput = document.getElementById('get_the_post_id');
//   const selectValue = document.getElementById('group-item');
//   const selected = document.getElementById('addGroupItemBtn');
//   console.log(selectValue.value)

  
  
console.log(selectInput.value);
  
// }


selected.addEventListener('click', function(){
  selectInput.value =  getSelectValues(selectValue);
  // selectInput.setAttribute('value', getSelectValues(selectValue))
  // selectInput.innerText =  getSelectValues(selectValue);
  console.log(selectInput.value);

  getSelectValues(selectValue).forEach(el => {
    let htmlPhp = '<?= get_the_post_thumbnail_url(' + el +', "thumbnail"); ?>';
    console.log(htmlPhp);
    addThumbnailArea.innerHTML = htmlPhp
  })
})