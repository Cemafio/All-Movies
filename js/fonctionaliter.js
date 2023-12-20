const containImgSlide = document.querySelector('.containImgSlide');
const btnTop = document.querySelector('.btnTop');
const i_top = document.querySelector('.btnTop i');

const btnBottom = document.querySelector('.btnBottom');
const i_bottom = document.querySelector('.btnBottom i');



let inc = 0;
let dec = 0;

btnBottom.addEventListener('click', function () {
    if(inc != -978){
        inc -= 322;
        containImgSlide.style.transform = `translateY(${inc}px)`;
        containImgSlide.style.transition = '0.5s';
    }
    
})
setInterval(function(){
    if(inc === -978){
        i_bottom.style.color='#3a3a3a';
    }else if(inc === 0){
        i_top.style.color='#ffffff6a';
    }else{
        i_top.style.color='#fff';
        i_bottom.style.color='#fff';
    }
}, 100);
btnTop.addEventListener('click', function () {
    if(inc != 0){
        inc += 322;
        containImgSlide.style.transform = `translateY(${inc
        }px)`;
        containImgSlide.style.transition = '0.5s';
    }
    
});
