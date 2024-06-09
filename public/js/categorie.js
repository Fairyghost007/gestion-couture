document.addEventListener("DOMContentLoaded",async (event)=>{
    const response =await fetch("http://localhost:8010/?controller=api-categorie&action=api-liste-categorie&page=1");
    const types= await response.json();
    console.log(types);
})