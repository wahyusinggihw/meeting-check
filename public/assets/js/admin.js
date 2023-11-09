const passwordApp = document.getElementById("password-app");
const password = document.getElementById("password");
const requirementsList = document.getElementById("requirements-list");
const requirements = document.getElementById("requirements");
const uppercase = document.getElementById("uppercase");
const number = document.getElementById("number");
const special = document.getElementById("special");
const eightChars = document.getElementById("eight-chars");
const confirmPasswordHTML = `<div class="input-field">
        <label for="confirm-password">Confirm password</label>
        <input id="confirm-password" type="password" placeholder="Confirm the password">
      </div>`;
const successHTML = `<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
        <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
        <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
      </svg>
      <p>The password matches!</p>`;

function checkRequirements(...requirementsArr) {
  let allRequirementsTrue = requirementsArr.every((requirement) =>
    requirement.classList.contains("fas")
  );

  if (allRequirementsTrue) {
    requirements.remove();
    addConfirmPassword();
  } else {
    requirementsList.innerHTML = "";
    requirementsList.appendChild(requirements);
  }
}

function addConfirmPassword() {
  requirementsList.innerHTML = confirmPasswordHTML;
  const confirmPassword = document.getElementById("confirm-password");

  confirmPassword.oninput = () => {
    let passwordValue = password.value;
    let confirmPasswordValue = confirmPassword.value;

    if (confirmPasswordValue === passwordValue) {
      passwordApp.innerHTML = successHTML;
    }
  };
}

function requirementTrue(requirement) {
  requirement.classList.add("fas");
  requirement.classList.remove("far");
}

function requirementFalse(requirement) {
  requirement.classList.add("far");
  requirement.classList.remove("fas");
}

password.oninput = () => {
  let passwordValue = password.value;
  if (passwordValue.match(/[A-Z]/)) {
    requirementTrue(uppercase);
  } else {
    requirementFalse(uppercase);
  }

  if (passwordValue.match(/[0-9]/)) {
    requirementTrue(number);
  } else {
    requirementFalse(number);
  }

  if (passwordValue.match(/[!@#$%^&*]/)) {
    requirementTrue(special);
  } else {
    requirementFalse(special);
  }

  if (passwordValue.length > 7) {
    requirementTrue(eightChars);
  } else {
    requirementFalse(eightChars);
  }

  checkRequirements(uppercase, number, special, eightChars);
};