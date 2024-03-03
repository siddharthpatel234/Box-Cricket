<?php
// include 'navbar.php';
error_reporting(E_ERROR | E_PARSE);
include 'conn.php';
$con=new connec();
if(!isset($_SESSION))
{
    session_start();
    
}

include 'navbar.php';

    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Payment Method</title>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
      }
      
      .container {
        margin: 0 auto;
        max-width: 600px;
        padding: 50px;
        text-align: center;
      }
      
      h1 {
        color: #333;
        font-size: 32px;
        margin-bottom: 30px;
      }
      
      label {
        display: inline-block;
        margin: 10px;
      }
      
      input[type="radio"] {
        display: none;
      }
      
      input[type="radio"] + label:before {
        border: 2px solid #ccc;
        border-radius: 50%;
        content: "";
        display: inline-block;
        height: 30px;
        margin-right: 10px;
        position: relative;
        top: 6px;
        width: 30px;
      }
      
      input[type="radio"]:checked + label:before {
        background-color: #2196f3;
        border-color: #2196f3;
        color: #fff;
        content: "\2022";
        text-align: center;
        font-size: 22px;
        line-height: 30px;
      }
      
      input[type="submit"] {
        background-color: #2196f3;
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        padding: 10px 20px;
        margin-top: 30px;
        transition: background-color 0.3s ease;
      }
      
      input[type="submit"]:hover {
        background-color: #0d8bf2;
      }

      /* new style for the text box */
      .payment-details {
        display: none;
      }
      .payment-details.show {
        display: block;
      }
      .payment-details label {
        display: block;
        margin-top: 20px;
      }
      .payment-details input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 16px;
      }
    </style>
  </head>
  <body>
  <div class="container">
    <h1>Choose your preferred payment method</h1>
    <form id="paymentform" action="verify.php" method="post">
      <input type="radio" id="credit-card" name="payment" value="credit-card">
      <label for="credit-card">Credit Card</label>
      <input type="radio" id="debit-card" name="payment" value="debit-card">
      <label for="debit-card">Debit Card</label>
      <input type="radio" id="paypal" name="payment" value="paypal">
      <label for="paypal">PayPal</label>
      <input type="radio" id="bank-transfer" name="payment" value="bank-transfer">
      <label for="bank-transfer">Bank Transfer</label>
      <div class="payment-details" id="credit-card-details">
        <label for="credit-card-number">Credit Card Number:</label>
        <input type="password" id="credit-card-number" name="credit-card-number" onkeypress="return isNumberKey(event)" oninput="setDebitCardFormat()" maxlength="9">
      </div>
      <div class="payment-details" id="debit-card-details">
        <label for="debit-card-number">Debit Card Number:</label>
        <input type="password" id="debit-card-number" name="debit-card-number" onkeypress="return isNumberKey(event)" oninput="setDebitCardFormat()" maxlength="9">
      </div>
      <div class="payment-details" id="paypal-details">
        <label for="paypal-email">PayPal Email:</label>
        <input type="password" id="paypal-email" name="paypal-email" onkeypress="return isNumberKey(event)" oninput="setDebitCardFormat()" maxlength="9">
      </div>
      <div class="payment-details" id="bank-transfer-details">
        <label for="bank-account-number">Bank Account Number:</label>
        <input type="password" id="bank-account-number" name="bank-account-number" onkeypress="return isNumberKey(event)" oninput="setDebitCardFormat()" maxlength="9">
      </div>
      <input type="submit" value="submit" name="btn_bookingdetails" onClick="validateForm()">
    </form>
  </div>
  <script>
    const paymentRadios = document.querySelectorAll('input[type="radio"]');
    const paymentDetails = document.querySelectorAll('.payment-details');

    
    function validateForm() {
        var w = document.getElementById("credit-card-number").value;
        var x = document.getElementById("debit-card-number").value;
        var y = document.getElementById("paypal-email").value;
        var z = document.getElementById("bank-account-number").value;

        if (paymentRadios[0].checked) {
            if (w == "") {
                alert("Insert Credit Card Number");
                event.preventDefault();
            }
            else{
                document.getElementById("myForm").submit();
            }
        }
        else if (paymentRadios[1].checked) {
            if (x == "") {
                alert("Insert Debit Card Number");
                event.preventDefault();
            }
            else{
                document.getElementById("myForm").submit();
            }
        }
        else if (paymentRadios[2].checked) {
            if (y == "") {
                alert("Insert Paypal Card Number");
                event.preventDefault();
            }
            else{
                document.getElementById("myForm").submit();
            }
        }
        else if (paymentRadios[3].checked) {
            if (z == "") {
                alert("Insert Bank Account Number");
                event.preventDefault();
            }
            else{
                document.getElementById("myForm").submit();
            }
        }
        else{
            event.preventDefault();
        }
    }

    function showPaymentDetails() {
      for (let i = 0; i < paymentRadios.length; i++) {
        if (paymentRadios[i].checked) {
          paymentDetails[i].classList.add('show');
        } else {
          paymentDetails[i].classList.remove('show');
        }
      }
    }

    for (let i = 0; i < paymentRadios.length; i++) {
      paymentRadios[i].addEventListener('click', showPaymentDetails);
    }


   
function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}

function setDebitCardFormat() {
  var debitcard = document.getElementById("debitcard");
  var debitcardvalue = debitcard.value;
  debitcardvalue = debitcardvalue.replace(/[^\d]/g, '').substring(0,9);
  var maskedvalue = "";
  for (var i = 0; i < debitcardvalue.length; i++) {
    if (i < 4) {
      maskedvalue += "X";
    } else if (i < 8) {
      maskedvalue += "*";
    } else {
      maskedvalue += debitcardvalue.charAt(i);
    }
  }
  debitcard.value = maskedvalue;
}

  </script>
</body>






<!-- <!DOCTYPE html>
<html>
  <head>
    <title>Payment Method</title>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
      }
      
      .container {
        margin: 0 auto;
        max-width: 600px;
        padding: 50px;
        text-align: center;
      }
      
      h1 {
        color: #333;
        font-size: 32px;
        margin-bottom: 30px;
      }
      
      label {
        display: inline-block;
        margin: 10px;
      }
      
      input[type="radio"] {
        display: none;
      }
      
      input[type="radio"] + label:before {
        border: 2px solid #ccc;
        border-radius: 50%;
        content: "";
        display: inline-block;
        height: 30px;
        margin-right: 10px;
        position: relative;
        top: 6px;
        width: 30px;
      }
      
      input[type="radio"]:checked + label:before {
        background-color: #2196f3;
        border-color: #2196f3;
        color: #fff;
        content: "\2022";
        text-align: center;
        font-size: 22px;
        line-height: 30px;
      }
      
      input[type="submit"] {
        background-color: #2196f3;
        border: none;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        padding: 10px 20px;
        margin-top: 30px;
        transition: background-color 0.3s ease;
      }
      
      input[type="submit"]:hover {
        background-color: #0d8bf2;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Choose your preferred payment method</h1>
      <form>
        <input type="radio" id="credit-card" name="payment" value="credit-card">
        <label for="credit-card">Credit Card</label>
        <input type="radio" id="debit-card" name="payment" value="debit-card">
        <label for="debit-card">Debit Card</label>
        <input type="radio" id="paypal" name="payment" value="paypal">
        <label for="paypal">PayPal</label>
        <input type="radio" id="bank-transfer" name="payment" value="bank-transfer">
        <label for="bank-transfer">Bank Transfer</label>
        <br>
        <input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html> -->
