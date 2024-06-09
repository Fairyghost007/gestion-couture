document.addEventListener("DOMContentLoaded",async (event)=>{
    const response =await fetch("http://localhost:8010/?controller=api-article&action=api-liste-article&page=1");
    const types= await response.json();
    console.log(types);
})