let burger = document.createElement("button");
let nav = document.querySelector("nav");
let menu = document.querySelector("ul");

window.addEventListener("resize", () => {
    if(window.innerWidth < 1212){
        burger.classList.add("visible");
        nav.appendChild(burger);

    }
    else{
        burger.remove();
    }
});

window.addEventListener("load", () => {
    if(window.innerWidth < 1212){
        burger.classList.add("visible");
        nav.appendChild(burger);

    }
    else{
        burger.remove();
    }
});

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