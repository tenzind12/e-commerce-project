paypal
  .Buttons({
    style: {
      shape: "pill",
      color: "gold",
    },

    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: parseFloat(document.getElementById("amount").textContent).toFixed(2),
            },
          },
        ],
      });
    },

    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        window.location.href = "cart.php?paid=true";
      });
    },
    // onApprove: function (data, actions) {
    //   return actions.order.capture().then(function (details) {
    //     const newDiv = document.createElement("div");
    //     newDiv.innerHTML = `
    //       <p class="mt-3">
    //         ✅Transaction completed by ${details.payer.name.given_name}.
    //         Transaction ID: ${details.id}
    //       </p>
    //       <h2 class="text-success">Thank you for your purchase!</h2>
    //       <p>Click here to <a href='profile.php'>go to courses</a></p>
    //       `;
    //     document.getElementById("payment-msg").appendChild(newDiv);
    //   });
    // },
  })
  .render("#paypal-button");
