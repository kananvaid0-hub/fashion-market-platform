// Explore Button
function showMessage(){
    alert("Welcome to the Fashion Collection!");
}

// Feedback Form
document.getElementById("feedbackForm")
.addEventListener("submit", async function(e){
    e.preventDefault();
    const inputs = this.querySelectorAll("input,textarea");
    const response = await fetch("feedback.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            name: inputs[0].value,
            email: inputs[1].value,
            message: inputs[2].value
        })
    });
    const result = await response.json();
    if (!response.ok || !result.success) {
        alert('Failed to send feedback.');
        return;
    }
    alert("Thank you for your feedback!");
    this.reset();
});

// Search Function
document.getElementById("search")
.addEventListener("keyup", function(){
    let value = this.value.toLowerCase();
    let cards = document.querySelectorAll(".card");
    cards.forEach(card => {
        let text = card.innerText.toLowerCase();
        card.style.display = text.includes(value) ? "block" : "none";
    });
});

let cart = [];
function addToCart(item) {
    cart.push(item);
    displayCart();
}

function displayCart() {
    let cartList = document.getElementById("cartList");
    cartList.innerHTML = "";
    cart.forEach((item, index) => {
        let li = document.createElement("li");
        li.innerHTML = `${item} <button onclick="removeFromCart(${index})">Remove</button>`;
        cartList.appendChild(li);
    });
    document.getElementById("cart").textContent = cart.length;
}

function removeFromCart(index) {
    cart.splice(index, 1);
    displayCart();
}

displayCart();

async function checkout(){
    let paymentMethod = document.getElementById("paymentMethod").value;
    const response = await fetch("payment.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({method: paymentMethod, items: cart})
    });
    const result = await response.json();
    if (!response.ok || !result.success) {
        document.getElementById("paymentMessage").innerHTML = "⚠️ Payment failed.";
        return;
    }
    document.getElementById("paymentMessage").innerHTML = "✅ Payment Successful using " + paymentMethod;
}

async function addReview(){
    let name = document.getElementById("customerName").value;
    let review = document.getElementById("reviewText").value;
    let rating = document.getElementById("rating").value;
    const response = await fetch("reviews.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({name, review, rating})
    });
    const result = await response.json();
    if (!response.ok || !result.success) {
        alert('Could not submit review.');
        return;
    }
    document.getElementById("reviewList").innerHTML += `<p>${rating} ${name}: ${review}</p>`;
    alert("Review Submitted");
}
