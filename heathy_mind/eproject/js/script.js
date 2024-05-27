const menuBar = document.querySelector(".menu-bar")
menuBar.addEventListener("click",function(){
    menuBar.classList.toggle("active")
    document.querySelector(".menu-items").classList.toggle("active")
})
// ***scroll****
const Top = document.querySelector(".top")
window.addEventListener("scroll",function(){
    const x = this.pageYOffset;
    if(x>80){
        Top.classList.add("active")
    }else{
        Top.classList.remove("active")
    }
})
