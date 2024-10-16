
// get all clickable buttons
let buttons = document.querySelectorAll(".clickable");

// add event listener to each button
for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function () {
        // create modal
        let modal = document.createElement("div");
        modal.classList.add("modal");

        // create modal close button
        let closeButton = document.createElement("span");
        closeButton.classList.add("close-button");
        closeButton.innerHTML = "&times;";
        closeButton.addEventListener("click", function () { modal.remove(); });

        // create modal content
        let modalContent = document.createElement("div");
        modalContent.classList.add("modal-content");
        modalContent.innerHTML = buttons[i].getAttribute("data-modal-content");

        // add modal to body
        document.body.appendChild(modal);
        // add model close button to modal
        modal.appendChild(closeButton);
        // add modal content to modal
        modal.appendChild(modalContent);


        // open modal
        modal.style.display = "block";

        // close modal when user clicks outside of modal
        window.addEventListener("click", function (event) {
            if (event.target == modal) { modal.remove(); }
        });
    });
}
