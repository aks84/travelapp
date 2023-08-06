    document.getElementById("cart").onclick = function() {
        var secondDiv = document.getElementById("cart_details");
        if (secondDiv.style.display === "inline-block") {
            secondDiv.style.display = "none";
        } else {
            secondDiv.style.display = "inline-block";
        }
    };
