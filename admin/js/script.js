function remove_image(container, remove_index) {
    let header_name = container.getAttribute("header_name");
    let counter = document.getElementById(header_name+"_counter");
    console.log(remove_index);
    container.removeChild(container.childNodes[remove_index]);
    for (let i = 0; i < container.childNodes.length; i++) {
        let panel = container.childNodes[i];
        panel.id = header_name+"_img_panel_"+i;
        panel.childNodes[0].name = header_name+"_img_"+i;
        let remove_btn = document.createElement("a");
        remove_btn.className = "a-button";
        remove_btn.addEventListener("click", (e) => remove_image(container, i));
        remove_btn.innerText = "Remove image";
        panel.replaceChild(remove_btn,panel.childNodes[1]);
    }
    counter.value = parseInt(counter.value)-1;
}

function add_image_panel(container) {
    let header_name = container.getAttribute("header_name");
    let counter = document.getElementById(header_name+"_counter");
    let current_node = counter.value;
    let input = document.createElement("input");
    input.type = "file";
    input.name = header_name+"_img_"+parseInt(counter.value);
    input.accept = "image/*";
    let remove_btn = document.createElement("a");
    remove_btn.className = "a-button";
    remove_btn.addEventListener("click", (e) => remove_image(container, current_node));
    remove_btn.innerText = "Remove image";
    let panel = document.createElement("li");
    panel.id = header_name+"_img_panel_"+parseInt(counter.value);
    panel.appendChild(input);
    panel.appendChild(remove_btn);
    container.appendChild(panel);
    counter.value = parseInt(counter.value)+1;
}