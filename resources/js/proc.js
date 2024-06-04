// console.log(app[0]);
var names = Object.keys(app[0]);
var values = Object.values(app[0]);
for(var i = 0; i < names.length; i++) {
    addOptionToDropdown2(names[i], values[i]);
}


document.getElementById("id_system").addEventListener("change", function () {
    // alert('change');
    var selectedOption1 = document.getElementById("id_system").value;
    const dropdown2 = document.getElementById("id_proc");

    // Clear existing options in dropdown2
    dropdown2.innerHTML = "";
    selectedOption1 -=1;
    // console.log(app[selectedOption1]);
    var names = Object.keys(app[selectedOption1]);
    var values = Object.values(app[selectedOption1]);

    // console.log(names);
    for(var i = 0; i < names.length; i++) {
        // console.log(names[i]);
        // console.log(values[i]);
        addOptionToDropdown2(names[i], values[i]);
    }
});

// Function to add an option to the dropdown (same as before)
function addOptionToDropdown2(text,value) {
    const dropdown2 = document.getElementById("id_proc");
    const newOption = document.createElement("option");
    newOption.value = value;
    newOption.text = text;
    dropdown2.appendChild(newOption);
}
