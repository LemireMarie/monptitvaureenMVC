let burger = document.createElement("button");
let nav = document.querySelector("nav");
let menu = document.querySelector("ul");
const imgHeader = document.querySelector(".header img");
const callback = () => {
    if (window.innerWidth < 580){
        imgHeader.classList.add("hidden")
    }
    else{
        imgHeader.classList.remove("hidden")
    }
    if(window.innerWidth < 1212 ){
        burger.classList.add("visible");
        nav.appendChild(burger);

    }
    else{
        burger.remove();
    }
}

window.addEventListener("resize", callback);

window.addEventListener("load", callback);

burger.addEventListener("click", () => {
    menu.classList.toggle("visible");
    burger.classList.toggle("active");
});
//Création d' une flèche retour haut de page :

let chevron = document.createElement("p");
    chevron.id = "scroll";
    chevron.textContent = ">";
    document.body.appendChild(chevron);

window.addEventListener("scroll", () => {
    if(window.scrollY > 800){
        chevron.classList.add("visible");
    }
    else{
        chevron.classList.remove("visible");
    }
});

chevron.addEventListener("click", () =>{
    window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
});