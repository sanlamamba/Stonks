<script>
window.addEventListener("DOMContentLoaded", (event) => {
    // SELECT BY ID VIEW TOGGLE
    alert("yes");
    document.addEventListener("contextmenu", (event) => event.preventDefault());
    const viewToggle = document.getElementById("viewToggle");

    //addeventlistener click to view toggle
    viewToggle.addEventListener("click", (event) => {
        alert("cvcvs");
        //get the view toggle
        //get all inputs with get elementbyid password
        const passwordInputs = document.getElementById("password");
        //if they are passwords change to text else change to password
        if (passwordInputs.type === "password") {
            passwordInputs.type = "text";
        } else {
            passwordInputs.type = "password";
        }
    });
});
</script>