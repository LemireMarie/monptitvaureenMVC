//création du burger menu
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

//au clic sur produit déployer le sous menu

let prod = document.querySelector(".products");
let sMenu = document.createElement("ul");
sMenu.setAttribute("class", "sousMenu hide")
prod.append(sMenu)

let savon = document.createElement("li")
let savLink = document.createElement("a")
savLink.setAttribute("href", "http://monptitvaureenmvc.test/produits/savons")
savLink.setAttribute("title", "redirection vers la page sur nos savons")
savLink.innerText = "Savons"
sMenu.append(savon)
savon.append(savLink)

let gom = document.createElement("li")
let gomLink = document.createElement("a")
gomLink.setAttribute("href", "http://monptitvaureenmvc.test/produits/gommages")
gomLink.setAttribute("title", "redirection vers la page sur nos gommages")
gomLink.innerText = "Gommages"
sMenu.append(gom)
gom.append(gomLink)

let shamp = document.createElement("li")
let shampLink = document.createElement("a")
shampLink.setAttribute("href", "http://monptitvaureenmvc.test/produits/shampoings")
shampLink.setAttribute("title", "redirection vers la page sur nos shampoings")
shampLink.innerText = "Shampoings"
sMenu.append(shamp)
shamp.append(shampLink)


prod.addEventListener("click", () =>{

    prod.appendChild(sMenu)
    sMenu.classList.toggle("hide");
})

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


//Création d'une modale
let savons = document.querySelectorAll(".savon")
var modal = document.createElement("div")
var para = document.querySelector(".design");
var infos = document.querySelectorAll(".infos");
var voil = document.createElement("div");
let bouton = document.createElement("button");

for (const singleSavon of savons) {
    let infoSingle = singleSavon.querySelector(".infos")
    let singlePara = singleSavon.querySelector(".design")

    infoSingle.addEventListener("click", () => {
        if (document.querySelector("div")){
            modal.setAttribute("id", "modal");
            voil.setAttribute("id", "voil");
            modal.appendChild(singlePara);
            bouton.setAttribute("id","close")
            modal.appendChild(bouton)
            bouton.innerText = "X"
            document.body.appendChild(voil);
            document.body.appendChild(modal);   

            singlePara.classList.remove("hide");
            voil.classList.remove("hide")
            bouton.classList.remove("hide")
        }
        //la modale disparait au clic sur le voile
        voil.addEventListener("click", () =>{
            if (document.querySelector("div")){
                singlePara.classList.add("hide");
                voil.classList.add("hide");
                bouton.classList.add("hide");
            }
        })
        //bouton close :
        bouton.addEventListener("click", () =>{
            if (document.querySelector("div")){
                singlePara.classList.add("hide");
                voil.classList.add("hide");
                bouton.classList.add("hide")
            }
        })
    });
    
    
}
document.getElementsByName("div")

