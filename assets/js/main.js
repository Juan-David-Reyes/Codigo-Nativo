$(document).ready(function(){

    let btn = document.querySelector('.mobile_menu');
    let iconMenu = document.querySelector('.mobile_menu .fas');
    let containerMenu = document.querySelector('.main_navbar');
    let overlay = document.querySelector('.overlay');

    $(btn).click(function(){
        
        if( $(btn).hasClass('active') ){

            $(btn).removeClass('active');
            
            let myTimeout = setTimeout(myGreeting, 300);
            $(overlay).css('opacity', '0');
            
            function myGreeting() {
                $(overlay).css('display', 'none');
            }
            
            $(iconMenu).removeClass('fa-times');
            $(containerMenu).removeClass('active');

        } else {
            let myTimeout = setTimeout(myGreeting, 100);


            $(btn).addClass('active')

            $(overlay).css('display', 'flex');
            $(overlay).css('transition', '300ms ease all');
            
            function myGreeting() {
                $(overlay).css('opacity', '1');
            }

            $(iconMenu).addClass('fa-times');
            $(containerMenu).addClass('active');

        }

    });



    // Función para agregar la clase al hacer scroll
function ScrollHeader() {
    var scrollY = window.scrollY;
    var elemento = document.querySelector('#header');

    if (scrollY > 120) { // Cambia este valor según tu preferencia
      elemento.classList.add('scroll');
    } else {
      elemento.classList.remove('scroll');
    }
  }

  // Evento para llamar a la función cuando se hace scroll
  window.addEventListener('scroll', ScrollHeader);





});

