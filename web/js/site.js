function contraer(){

    var elemsHiden = document.getElementsByClassName('nav-big');
    var elemsVisible = document.getElementsByClassName('nav-small');
    
    let content = document.getElementById('content');
    let element = window.getComputedStyle(document.getElementById('sidebar')).getPropertyValue('width');
    
    var sidebar = document.getElementById('sidebar');
    console.log(element)

    if( element == '60px'){
        content.style.setProperty('width','89%');
        sidebar.style.setProperty('max-width','220px')
        for (let index = 0; index < elemsHiden.length; index++) {
            if(elemsHiden[index] != null){
                elemsHiden[index].style.display = "inline";
            }
            if(elemsVisible[index] != null){
                elemsVisible[index].style.display = "none";
            }
        }
    }else{
        content.style.setProperty('width','100%');
        sidebar.style.setProperty('max-width','60px')
        for (let index = 0; index < elemsHiden.length; index++) {
            if(elemsHiden[index] != null){
                elemsHiden[index].style.display = "none";
            }
            if(elemsVisible[index] != null){
                elemsVisible[index].style.display = "inline";
            }
        }
    }
     
}

function openBurger(){
    
    var sidebar = document.getElementById('sidebar');
    var openButton = document.getElementById('open');
    var closeButton = document.getElementById('close');
    sidebar.style.setProperty('display', 'flex');
    openButton.style.setProperty('display','none');
    closeButton.style.setProperty('display', 'block');
    
}

function closeBurger(){
    
    var sidebar = document.getElementById('sidebar');
    var openButton = document.getElementById('open');
    var closeButton = document.getElementById('close');
    sidebar.style.setProperty('display', 'none');
    openButton.style.setProperty('display','block');
    closeButton.style.setProperty('display', 'none');
    
}