 // Get all input elements
 const inputs = document.querySelectorAll('input');

 // Add event listeners for invalid and input events to each input element
 inputs.forEach(input => {
     input.addEventListener('invalid', function(event) {
         event.preventDefault();
         const errorMessage = this.parentNode.querySelector('.error-message');
         errorMessage.style.display = "block";
         this.style.border = "1px solid red"; // Add border to highlight the input field
     });

     input.addEventListener('input', function(event) {
         event.preventDefault();
         const errorMessage = this.parentNode.querySelector('.error-message');
         this.style.border = "1px solid white"; // Remove border when the user starts typing
         errorMessage.style.display = "none"; // Hide the error message
     });
 });



 function validateForm(form) {
  // Floors
  var floorsInput = form.elements["floors"];
  var floorsValue = floorsInput.value;
  if (!Number.isInteger(parseInt(floorsValue))) {
    const errorMessage = floorsInput.parentNode.querySelector('.error-message-number');
    errorMessage.style.display = "block";
    return false; // Prevent form submission
  }
  
  // Rooms
  var roomsInput = form.elements["rooms"];
  var roomsValue = roomsInput.value;
  if (!Number.isInteger(parseInt(roomsValue))) {
    const errorMessage = roomsInput.parentNode.querySelector('.error-message-number');
    errorMessage.style.display = "block";
    return false; // Prevent form submission
  }
  
  // Kitchen
  var kitchenInput = form.elements["kitchen"];
  var kitchenValue = kitchenInput.value;
  if (!Number.isInteger(parseInt(kitchenValue))) {
    const errorMessage = kitchenInput.parentNode.querySelector('.error-message-number');
    errorMessage.style.display = "block";
    return false; // Prevent form submission
  }
  
  // Bathroom
  var bathroomInput = form.elements["bathroom"];
  var bathroomValue = bathroomInput.value;
  if (!Number.isInteger(parseInt(bathroomValue))) {
    const errorMessage = bathroomInput.parentNode.querySelector('.error-message-number');
    errorMessage.style.display = "block";
    return false; // Prevent form submission
  }
  
  // Form is valid, allow submission
  return true;
}
