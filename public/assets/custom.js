rediobtns = document.querySelectorAll('.redio');
cards = document.querySelectorAll('.gold');

rediobtns.forEach(button =>{
  button.addEventListener('change',selected);
  });

function selected(e)
{
  btnvalue=e.target.dataset.filter;

  cards.forEach(card=>{
    e.target.classList.remove('hide')
    if(card.dataset.name  == btnvalue )
        return card.classList.remove("hide");
      card.classList.add("hide");
    
  })
  
}

p=document.querySelector('#print')
p.addEventListener('click',function (){
  localStorage.clear();
  onetola = document.getElementById('onetola');
  gm = document.getElementById('gm');
  price = document.getElementById('price');
  localStorage.setItem("onetola", onetola.value);
  localStorage.setItem("price", price.value);
  localStorage.setItem("gm", gm.value);
  var W = window.open("../invoice");   
  W.window.print();
  // window.location.replace("../invoice");
})