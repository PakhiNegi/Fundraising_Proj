function validateForm() {
  var amount = document.getElementById("amount").value;
  var currency = document.getElementById("currency").value;
  if (currency !== "INR") {
    alert("Please select INR (Rupees) as currency");
    return false;
  }
  return true;
}
