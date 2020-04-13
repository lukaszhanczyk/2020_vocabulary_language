document.addEventListener('DOMContentLoaded', function(){
  function delElemFunction(){
    var delElem=document.getElementsByClassName('delElem');
      for (var i = 0; i < delElem.length; i++) {
        delElem[i].addEventListener('click',function(e){
          this.parentElement.remove();
        });
      }
  }

  document.getElementById('addElem').addEventListener('click',function(){
    var input=document.getElementsByClassName('inp');
    var tab=new Array();
    for (var i = 0; i < input.length; i++) {
      tab[i]=input[i].value;
    }
    document.getElementById('added').innerHTML+='<div class="package d-flex justify-content-around align-items-center"><input type="text" class="inp" name="word_in_pl[]" vlaue=" "><input type="text" class="inp" name="word_in_en[]" vlaue=" "><button type="button" class="delElem btn btn-light add_button">x</button></div>';
    var after=document.getElementsByClassName('inp');
    for (var i = 0; i < tab.length; i++) {
      after[i].value=tab[i];
    }
    delElemFunction();
    });
    delElemFunction();
});
