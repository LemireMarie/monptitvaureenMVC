const stripe = Stripe("pk_test_51OA6OtHKJAYabKHMV4tfNOoItfRx3UxINd11tX52Ft4opErppyQBBovZTXT76moJUxDCZblCZbShY9izYel1RpRl00hlV43qMJ");

let items;

let elements;

document.querySelectorAll(".payment").forEach((element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault()
    items = [{id: element.id}]
    initialize();
    checkStatus();

    document
      .querySelector("#payment-form")
      .addEventListener("submit", handleSubmit);
  })
})





async function initialize() {
  const { clientSecret } = await fetch("/achat", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ items }),
  }).then((r) => r.json());

  elements = stripe.elements({ clientSecret });

  const paymentElementOptions = {
    layout: "tabs",
  };

  const paymentElement = elements.create("payment", paymentElementOptions);
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      return_url: "http://monptitvaureenMVC.test/produits",
      receipt_email: "marie.lemire@hotmail.com",
    },
  });

  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }

  setLoading(false);
}

async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageContainer.textContent = "";
  }, 4000);
}

function setLoading(isLoading) {
  if (isLoading) {
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}

//Création de la modale de paiement
let modale = document.querySelector(".modale")
let voile = document.querySelector(".voile")
let pay = document.querySelector(".payement")

pay.addEventListener("click", () => {
     
})
