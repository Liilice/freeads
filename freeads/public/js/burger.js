window.onload = function () {
    let button = document.querySelector(".relative");
    let dropList = document.querySelector(".absolute");
    let open = true;
    button.addEventListener("click", () => {
        if (open) {
            dropList.style.display = "block";
            open = false;
        } else {
            dropList.style.display = "none";
            open = true;
        }
    });
};
