// console.log(select[0]);
console.log(proc);  
var selectedOption1 = document.getElementById("id_system").value;
const label = document.createElement("label");
const input = document.createElement("input");
const divp = document.getElementById("procesos");
selectedOption1 -= 1;
var names = Object.keys(proc.select[selectedOption1]);
var values = Object.values(proc.select[selectedOption1]);
if (names.length == 0) {
    label.textContent = "Procesos";
    label.classList = "block mb-2 text-sm font-semibold text-red-900";
    divp.appendChild(label);
    input.type = "text";
    input.id = "id_proc";
    input.name = "id_procesos";
    input.placeholder = "Este sistema no tiene procesos";
    input.disabled = true;
    input.classList =
        "text-sm font-semibold w-full text-red-800 rounded-lg border block p-2.5 border-red-800";
    divp.appendChild(input);
} else {
    const select = document.createElement("select");
    label.textContent = "Procesos";
    label.classList = "block mb-2 text-sm font-semibold text-emerald-900";
    divp.appendChild(label);
    select.id = "id_proc";
    select.name = "id_proc";
    select.classList =
        "bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 ";
    divp.appendChild(select);
    for (var i = 0; i < names.length; i++) {
        // console.log(names[i]);
        // console.log(values[i]);
        if( proc.proc != null){
            if(values[i] == proc.proc){
                addOptionToDropdown2(names[i], values[i], true);
            }
            else{
                addOptionToDropdown2(names[i], values[i]);
            }

        }else{

            if(proc.ele != null){
            
                if(values[i] == proc.ele.id_proc){
                    addOptionToDropdown2(names[i], values[i], true);
                }
                else{
                    addOptionToDropdown2(names[i], values[i]);
                }
            }
            else{
                addOptionToDropdown2(names[i], values[i]);
                
            }
        }
    }
}

document.getElementById("id_system").addEventListener("change", function () {
    var selectedOption1 = document.getElementById("id_system").value;
    divp.innerHTML = "";
    selectedOption1 -= 1;
    var names = Object.keys(proc.select[selectedOption1]);
    var values = Object.values(proc.select[selectedOption1]);

    // console.log(names);
    if (names.length == 0) {
        label.textContent = "Procesos";
        label.classList = "block mb-2 text-sm font-semibold text-red-900";
        divp.appendChild(label);
        input.type = "text";
        input.id = "id_proc";
        input.name = "id_procesos";
        input.placeholder = "Este sistema no tiene procesos";
        input.disabled = true;
        input.classList =
            "text-sm font-semibold w-full text-red-800 rounded-lg border block p-2.5 border-red-800";
        divp.appendChild(input);
    } else {
        const select = document.createElement("select");
        label.textContent = "Procesos";
        label.classList = "block mb-2 text-sm font-semibold text-emerald-900";
        divp.appendChild(label);
        select.id = "id_proc";
        select.name = "id_proc";
        select.classList =
            "bg-gray-50 border border-gray-300 text-gray-900 hover:border-emerald-900 focus:ring-emerald-900  focus:border-emerald-900 text-sm rounded-lg  block w-full p-2.5 ";
        divp.appendChild(select);
        for (var i = 0; i < names.length; i++) {
            // console.log(names[i]);
            // console.log(values[i]);
            addOptionToDropdown2(names[i], values[i]);
        }
    }
});

// Function to add an option to the dropdown (same as before)
function addOptionToDropdown2(text, value, selected = false) {
    const dropdown2 = document.getElementById("id_proc");
    const newOption = document.createElement("option");
    newOption.value = value;
    newOption.text = text;
    if (selected) {
        newOption.selected = true;
    }
    dropdown2.appendChild(newOption);
}
