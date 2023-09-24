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