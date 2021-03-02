jQuery(function(){
  let cbJordan = jQuery("input:checkbox[name='jdc_top_cb']");
  let textJordan = jQuery("#jdc_top");
  console.log(textJordan);


  cbJordan.click(function(){
    if(jQuery(this).is(":checked") === true){
      textJordan.val('true');
    } else{
      textJordan.val('');
    }
  })
});