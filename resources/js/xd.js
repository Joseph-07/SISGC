const toggleSearchButton = document.getElementById("toggleSearch");
const searchForm = document.getElementById("searchForm");
const searchBar = document.getElementById("searchBar");
const searchButton = document.getElementById("searchButton");

// toggleSearchButton.addEventListener("click", () => {
//     // searchButton.classList.toggle("scale-up-ver-top");
//     // if (searchButton.classList.contains("scale-up-ver-top")) {
//     //     searchButton.classList.remove("scale-up-ver-top");
//     //     searchButton.classList.add("scale-down-ver-top");
//     // }

//     searchForm.classList.toggle("hidden");
//     // searchButton.classList.toggle("scale-up-ver-top");
//     searchBar.classList.toggle("bg-slate-600");
//     searchBar.classList.toggle("bg-emerald-700");
//     if (searchForm.classList.contains("hidden")) {
//         toggleSearchButton.innerHTML = "Buscar";
//         searchButton.classList.add("scale-down-ver-top");
//     } else {
//         toggleSearchButton.innerHTML = "Ocultar";
//         searchButton.classList.add("scale-up-ver-top");
//         searchButton.classList.remove("scale-down-ver-top");
//     }
// });

const createModal = document.getElementById("crud-modal-s");
// const editModal = document.getElementById("crud-modal-e");
const modal = document.querySelectorAll('[id^="crud-modal"]');
const btnclose = document.querySelectorAll('[id^="close-modal"]');
const btndelete = document.querySelectorAll('[id^="btn-delete-"]');
const btn = document.getElementById("btn-modal");
// const btnclose = document.getElementById("close-modal");
// const btncloseE = document.getElementById("close-modal-e");

// console.log(botones);
// btn.addEventListener("click", () => {
//     createModal.classList.toggle("hidden");
// });

window.onclick = function (event) {
    // if (event.target == btnclose) {
    //     createModal.classList.toggle("hidden");
    // }
    // if (event.target == btncloseE) {
    //     editModal.classList.toggle("hidden");
    // }

    console.log(event.target);

    if(event.target.id.includes("btn-delete-")){
        console.log("delete-pop-up");
        let id = event.target.id;
        id = id.replace("btn-delete-","");
        console.log(id);
        document.getElementById("container").classList.remove("zoom");
        document.getElementById("crud-modal-"+id).classList.toggle("hidden");
    }

    if (event.target.id.includes("close-modal")) {
        console.log("click");

        for (const mod of modal) {
            if (!mod.classList.contains("hidden")) {
                mod.classList.add("hidden");
            } 
        }
    }

    if (event.target == btn) {
        createModal.classList.toggle("hidden");
    }
    if (event.target == toggleSearchButton) {
        searchForm.classList.toggle("hidden");
        searchBar.classList.toggle("bg-slate-600");
        searchBar.classList.toggle("bg-emerald-700");
        if (searchForm.classList.contains("hidden")) {
            toggleSearchButton.innerHTML = "Buscar";
            searchBar.classList.add("zoomh");
            searchButton.classList.add("scale-down-ver-top");
        } else {
            toggleSearchButton.innerHTML = "Ocultar";
            searchBar.classList.remove("zoomh");
            searchButton.classList.add("scale-up-ver-top");
            searchButton.classList.remove("scale-down-ver-top");
        }
    }
};

// btnclose.addEventListener("click", () => {
//     createModal.classList.toggle("hidden");
// });
// btncloseE.addEventListener("click", () => {
//     editModal.classList.toggle("hidden");
// });
// alert(xdd);
