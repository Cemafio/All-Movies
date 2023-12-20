const insert = document.querySelector('.insert');
const containForm7 = document.querySelector('.containForm7');
const btnX = document.querySelector('.btnClose');

insert.addEventListener('click', function () {
    // alert('Click');
    containForm7.style.visibility = 'visible';
})

btnX.addEventListener('click', function () {
    // alert('Click');
    containForm7.style.visibility = 'hidden';
})