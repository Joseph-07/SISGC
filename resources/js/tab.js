console.log(selec);

document.querySelectorAll('[id^="tag-"]').forEach((tag) => {
    // console.log(tag.id);
    if(tag.id == "tag-"+selec){
        tag.classList.add("bg-slate-200");
    }else{
        tag.classList.remove("bg-slate-200");
    }
})

document.querySelectorAll('[id^="tab-"]').forEach((tab) => {
    // console.log("tab-"+selec);
    if(tab.id == "tab-"+selec){
        // tab.classList.remove("zoom");
        tab.classList.remove("hidden");
    }else{
        tab.classList.add("hidden");
    }
});