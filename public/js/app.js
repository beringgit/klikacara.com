function slider(){
    var sliderContainer =  document.getElementById('why-container');
    var sliderWidth = sliderContainer.clientWidth;
    var sliderHeight = sliderContainer.clientHeight;
    var x = 0;
    console.log(sliderWidth + ' ' + sliderHeight);
}

$(document).ready(function(){
    slider();
});